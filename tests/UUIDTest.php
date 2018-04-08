<?php

declare(strict_types=1);

namespace Ejiayou\PHP\Utils\Tests;

use PHPUnit\Framework\TestCase;
use Ejiayou\PHP\Utils\String\UUID;

final class UUIDTest extends TestCase 
{

    public function testCannotBeShow()
    {
        $uuid = UUID::create();
        $this->expectOutputString($uuid);
        print $uuid;
    }

}