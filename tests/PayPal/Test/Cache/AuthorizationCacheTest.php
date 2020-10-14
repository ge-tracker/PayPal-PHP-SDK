<?php

namespace PayPal\Test\Cache;

use PayPal\Cache\AuthorizationCache;
use PHPUnit\Framework\TestCase;

/**
 * Test class for AuthorizationCacheTest.
 */
class AuthorizationCacheTest extends TestCase
{
    public const CACHE_FILE = 'tests/var/test.cache';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function teatDown(): void
    {
    }

    public static function EnabledProvider()
    {
        return [
            [['cache.enabled' => 'true'], true],
            [['cache.enabled' => true], true],
        ];
    }

    public static function CachePathProvider()
    {
        return [
            [['cache.FileName' => 'temp.cache'], 'temp.cache'],
        ];
    }

    /**
     * @dataProvider EnabledProvider
     */
    public function testIsEnabled($config, $expected)
    {
        $result = AuthorizationCache::isEnabled($config);
        self::assertEquals($expected, $result);
    }

    /**
     * @dataProvider CachePathProvider
     */
    public function testCachePath($config, $expected)
    {
        $result = AuthorizationCache::cachePath($config);
        self::assertStringContainsString($expected, $result);
    }

    public function testCacheDisabled()
    {
        self::markTestSkipped();
        // 'cache.enabled' => true,
        AuthorizationCache::push(['cache.enabled' => false], 'clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn');
        AuthorizationCache::pull(['cache.enabled' => false], 'clientId');
    }

    public function testCachePush()
    {
        AuthorizationCache::push(['cache.enabled' => true, 'cache.FileName' => self::CACHE_FILE], 'clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn');
        $contents = file_get_contents(self::CACHE_FILE);
        $tokens = json_decode($contents, true);
        self::assertNotNull($contents);
        self::assertEquals('clientId', $tokens['clientId']['clientId']);
        self::assertEquals('accessToken', $tokens['clientId']['accessTokenEncrypted']);
        self::assertEquals('tokenCreateTime', $tokens['clientId']['tokenCreateTime']);
        self::assertEquals('tokenExpiresIn', $tokens['clientId']['tokenExpiresIn']);
    }

    public function testCachePullNonExisting()
    {
        $result = AuthorizationCache::pull(['cache.enabled' => true, 'cache.FileName' => self::CACHE_FILE], 'clientIdUndefined');
        self::assertNull($result);
    }

    /**
     * @depends testCachePush
     */
    public function testCachePull()
    {
        $result = AuthorizationCache::pull(['cache.enabled' => true, 'cache.FileName' => self::CACHE_FILE], 'clientId');
        self::assertNotNull($result);
        self::assertIsArray($result);
        self::assertEquals('clientId', $result['clientId']);
        self::assertEquals('accessToken', $result['accessTokenEncrypted']);
        self::assertEquals('tokenCreateTime', $result['tokenCreateTime']);
        self::assertEquals('tokenExpiresIn', $result['tokenExpiresIn']);

        unlink(self::CACHE_FILE);
    }
}
