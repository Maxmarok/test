<?php

namespace Tests\Unit;

use App\Classes\UserInfo;
use Tests\TestCase;

class UserInfoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $userInfo;
    protected $userAgent;

    public function setUp() :void
    {
        parent::setUp();
        $this->userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
        $this->userInfo = new UserInfo($this->userAgent);
    }

    public function testGetCountry()
    {
        $getCountry = $this->userInfo->getCountry();
        $this->assertEquals('United States', $getCountry);
    }

    public function testGetCity()
    {
        $getCity = $this->userInfo->getCity();
        $this->assertEquals('New Haven', $getCity);
    }

    public function testGetBrowserType()
    {
        $getBrowserType = $this->userInfo->getBrowserType();
        $this->assertEquals('Chrome', $getBrowserType);
    }

    public function testGetBrowserVersion()
    {
        $getBrowserVersion = $this->userInfo->getBrowserVersion();
        $this->assertEquals('102.0.0.0', $getBrowserVersion);
    }

    public function testGetPlatformType()
    {
        $getPlatformType = $this->userInfo->getPlatformType();
        $this->assertEquals('Windows', $getPlatformType);
    }

    public function testGetPlatformVersion()
    {
        $getPlatformVersion = $this->userInfo->getPlatformVersion();
        $this->assertEquals('10.0', $getPlatformVersion);
    }

    public function testGetUserAgent()
    {
        $getUserAgent = $this->userInfo->getUserAgent();
        $this->assertEquals($this->userAgent, $getUserAgent);
    }
}
