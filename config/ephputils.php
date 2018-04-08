<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  crypt key
     | ------------------------------------------------------------------------------------------------
     */
    'crypt_key'  => '1234567890A',
    /* ------------------------------------------------------------------------------------------------
     |  signature_author
     | ------------------------------------------------------------------------------------------------
     */
    'signature_author'  => '1234567890A',
    /* ------------------------------------------------------------------------------------------------
     |  sms code send api
     | ------------------------------------------------------------------------------------------------
     */
    'sms_code_send_api'  => 'https://xxx.xxxx.com',
    /* ------------------------------------------------------------------------------------------------
     |  sms sale send api
     | ------------------------------------------------------------------------------------------------
     */
    'sms_sale_send_api'  => 'https://xxx.xxxx.com',
    /* ------------------------------------------------------------------------------------------------
     |  mp weixin config
     | ------------------------------------------------------------------------------------------------
     */
    'mp_weixin' => [
        'default' => [
            'app_id' => 'app_id',
            'app_secret' => 'app_secret',
            'access_token_key' => 'AccessToken-mp-weixin-app_id',
            'jsapi_ticket_key' => 'JsapiTicket-mp-weixin-app_id',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ],
        'default1' => [
            'app_id' => 'app_id',
            'app_secret' => 'app_secret',
            'access_token_key' => 'AccessToken-mp-weixin-app_id',
            'jsapi_ticket_key' => 'JsapiTicket-mp-weixin-app_id',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ]
    ],
    /* ------------------------------------------------------------------------------------------------
     |  app weixin config
     | ------------------------------------------------------------------------------------------------
     */
    'app_weixin' => [
        'default' => [
            'app_id' => 'app_id',
            'app_secret' => 'app_secret',
            'access_token_key' => 'AccessToken-mp-weixin-app_id',
            'jsapi_ticket_key' => 'JsapiTicket-mp-weixin-app_id',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ],
        'default1' => [
            'app_id' => 'app_id',
            'app_secret' => 'app_secret',
            'access_token_key' => 'AccessToken-mp-weixin-app_id',
            'jsapi_ticket_key' => 'JsapiTicket-mp-weixin-app_id',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ]
    ],
    /* ------------------------------------------------------------------------------------------------
     |  work weixin config
     | ------------------------------------------------------------------------------------------------
     */
    'work_weixin' => [
        'default' => [
            'corp_id' => 'corp_id',
            'agent_id' => 'agent_id',
            'corp_secret' => 'corp_secret',
            'access_token_key' => 'AccessToken-work-weixin-app_secret',
            'jsapi_ticket_key' => 'JsapiTicket-work-weixin-app_secret',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ],
        'default1' => [
            'corp_id' => 'corp_id',
            'agent_id' => 'agent_id',
            'corp_secret' => 'app_secret',
            'access_token_key' => 'AccessToken-work-weixin-app_secret',
            'jsapi_ticket_key' => 'JsapiTicket-work-weixin-app_secret',
            'access_token_server' => 'https://xxx.xxxx.com',
            'jsapi_ticket_server' => 'https://xxx.xxxx.com'
        ]
    ]
];
