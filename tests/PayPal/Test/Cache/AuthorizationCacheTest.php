<?php

namespace PayPal\Test\Cache;

use PayPal\Cache\AuthorizationCache;
use PHPUnit\Framework\TestCase;

/**
 * Test class for AuthorizationCacheTest.
 *
 */
class AuthorizationCacheTest extends TestCase
{
    const CACHE_FILE = 'tests/var/test.cache';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public static function EnabledProvider(): array
    {
        return array(
            array(array('cache.enabled' => 'true'), true),
            array(array('cache.enabled' => true), true),
        );
    }

    public static function CachePathProvider(): array
    {
        return array(
            array(array('cache.FileName' => 'temp.cache'), 'temp.cache')
        );
    }

    /**
     *
     * @dataProvider EnabledProvider
     */
    public function testIsEnabled($config, $expected): void
    {
        $result = AuthorizationCache::isEnabled($config);
        self::assertEquals($expected, $result);
    }

    /**
     * @dataProvider CachePathProvider
     */
    public function testCachePath($config, $expected): void
    {
        $result = AuthorizationCache::cachePath($config);
        self::assertContains($expected, $result);
    }

    public function testCacheDisabled(): void
    {
        // 'cache.enabled' => true,
        AuthorizationCache::push(array('cache.enabled' => false), 'clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn');
        AuthorizationCache::pull(array('cache.enabled' => false), 'clientId');
    }

    public function testCachePush(): void
    {
        AuthorizationCache::push(array('cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE), 'clientId', 'accessToken', 'tokenCreateTime', 'tokenExpiresIn');
        $contents = file_get_contents(AuthorizationCacheTest::CACHE_FILE);
        $tokens = json_decode($contents, true);
        self::assertNotNull($contents);
        self::assertEquals('clientId', $tokens['clientId']['clientId']);
        self::assertEquals('accessToken', $tokens['clientId']['accessTokenEncrypted']);
        self::assertEquals('tokenCreateTime', $tokens['clientId']['tokenCreateTime']);
        self::assertEquals('tokenExpiresIn', $tokens['clientId']['tokenExpiresIn']);
    }

    public function testCachePullNonExisting(): void
    {
        $result = AuthorizationCache::pull(array('cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE), 'clientIdUndefined');
        self::assertNull($result);
    }

    /**
     * @depends testCachePush
     */
    public function testCachePull(): void
    {
        $result = AuthorizationCache::pull(array('cache.enabled' => true, 'cache.FileName' => AuthorizationCacheTest::CACHE_FILE), 'clientId');
        self::assertNotNull($result);
        $this->assertInternalType('array', $result);
        self::assertEquals('clientId', $result['clientId']);
        self::assertEquals('accessToken', $result['accessTokenEncrypted']);
        self::assertEquals('tokenCreateTime', $result['tokenCreateTime']);
        self::assertEquals('tokenExpiresIn', $result['tokenExpiresIn']);

        unlink(AuthorizationCacheTest::CACHE_FILE);
    }
}
