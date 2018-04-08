<?php

namespace Ejiayou\PHP\Utils\Log;

use App\Models\Admin\Admin;
use App\Models\Admin\Operate;
use Monolog\Logger;
use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Log;

/**
 * 易加油日志工具类
 * Class LogUtils
 * @package Ejiayou\PHP\Utils\Log
 */
class LogUtils
{
    // 所有的LOG都要求在这里注册
    private static $loggers = array();

    /**
     * 打印debug
     * @param $content
     * @param int $day
     */
    public static function debug($content ,$day = 30)
    {
        $type = 'debug';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->debug($content);
    }

    /**
     * 打印info
     * @param $content
     * @param int $day
     */
    public static function info($content, $day = 30)
    {
        $type = 'info';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->info($content);
    }

    /**
     * 打印WARN
     * @param $content
     * @param int $day
     */
    public static function warn($content, $day = 30)
    {
        $type = 'warn';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->warning($content);
    }

    /**
     * 打印error
     * @param $content
     * @param int $day
     */
    public static function error($content, $day = 30)
    {
        $type = 'error';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->error($content);
        Log::error($content);
    }

    /**
     * 打印queue error
     * @param $content
     * @param int $day
     */
    public static function queueError($content, $day = 30)
    {
        $type = 'queue_error';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->error($content);
    }

    /**
     * 打印queue info
     * @param $content
     * @param int $day
     */
    public static function queueInfo($content, $day = 30)
    {
        $type = 'queue_info';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->info($content);
    }

    /**
     * 打印定时任务crontab info
     * @param $content
     * @param int $day
     */
    public static function crontabInfo($content, $day = 30)
    {
        $type = 'crontab_info';

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'. $type .'.log', $day);
        }
        $log = self::$loggers[$type];

        $log->info($content);
    }

    //活动后台操作纪录
    public static function operateLog($admin_id,$operate_type = 0,$operate_content)
    {
        if(!$admin_id){
            LogUtils::info("活动操作日志::admin_id参数出现错误");
        }

        $admin = Admin::where('state',1)->where('id',$admin_id)->first();
        if(!$admin){
            LogUtils::error("活动操作日志::admin_id->$admin_id,的用户信息不存在");
            return;
        }
        $username = $admin->username;

        //获取访问用户IP
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip_address = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $ip_address = $_SERVER["REMOTE_ADDR"];
        }

        $operateion = new Operate();
        $operateion->admin_id = $admin_id;
        $operateion->username = $username;
        $operateion->operate_time = date("Y-m-d H:i:s");
        $operateion->operate_content = $operate_content;
        $operateion->operate_type = $operate_type;
        $operateion->ip_address = $ip_address;

        DB::beginTransaction();
        try{
            $operateion->save();
        }catch(\Exception $e){
            DB::rollBack();
            LogUtils::error($e);
        }
        DB::commit();
    }
}
