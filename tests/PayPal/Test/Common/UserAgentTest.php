<?php

use PayPal\Common\PayPalUserAgent;
use PHPUnit\Framework\TestCase;

class UserAgentTest extends TestCase
{

    public function testGetValue(): void
    {
        $ua = PayPalUserAgent::getValue("name", "version");
        [$id, $version, $features] = sscanf($ua, "PayPalSDK/%s %s (%[^[]])");

        // Check that we pass the useragent in the expected format
        self::assertNotNull($id);
        self::assertNotNull($version);
        self::assertNotNull($features);

        self::assertEquals("name", $id);
        self::assertEquals("version", $version);

        // Check that we pass in these mininal features
        self::assertThat($features, self::stringContains("os="));
        self::assertThat($features, self::stringContains("bit="));
        self::assertThat($features, self::stringContains("platform-ver="));
        self::assertGreaterThan(5, count(explode(';', $features)));
    }
}
