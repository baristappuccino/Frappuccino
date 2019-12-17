<?php

namespace Kernel\Test;

use PHPUnit\Framework\TestCase;
use function Kernel\Util\Sanitize\alphanum;
use function Kernel\Util\Sanitize\quotes;

class SanatizationTest extends TestCase
{

    public function testAlphanumericalSerialization()
    {
        $this->assertEquals(
            "a", alphanum("a@")
        );
    }

    public function testQuotedSerialization()
    {
        $this->assertEquals(
            "&quot;@&lt;&gt;", quotes("\"@<>")
        );
    }

}