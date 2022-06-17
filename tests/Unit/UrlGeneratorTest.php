<?php

namespace Tests\Unit;

use App\Classes\UrlGenerator;
use Tests\TestCase;

class UrlGeneratorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $urlGenerator;

    public function setUp() :void
    {
        parent::setUp();
        $this->urlGenerator = new UrlGenerator();
    }

    public function testGetOriginUrl()
    {
        $url = 'vk.com';
        $originUrl = $this->urlGenerator->getOriginUrl($url);
        $this->assertEquals('http://vk.com', $originUrl);
    }
}
