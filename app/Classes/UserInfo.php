<?php

namespace App\Classes;

use Jenssegers\Agent\Agent;

class UserInfo
{
    private $agent;
    private $geoip;
    private $user_agent;

    public function __construct(String $info = null)
    {
        $this->agent = new Agent();
        $this->geoip = geoip()->getLocation();
        $this->user_agent = $this->setUserAgent($info);
    }

    public function getCountry()
    {
        return $this->geoip->country;
    }

    public function getCity()
    {
        return $this->geoip->city;
    }

    public function getBrowserType()
    {
        return $this->agent->browser();
    }

    public function getBrowserVersion()
    {
        return $this->agent->version($this->getBrowserType());
    }

    public function getPlatformType()
    {
        return $this->agent->platform();
    }

    public function getPlatformVersion()
    {
        return $this->agent->version($this->getPlatformType());
    }

    public function getUserAgent()
    {
        return $this->user_agent;
    }

    public function setUserAgent(String $info = null)
    {
        $info ?? request()->header('User-agent');
        return $this->agent->setUserAgent($info);
    }
}
