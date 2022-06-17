<?php

namespace App\Classes;

class UrlGenerator
{
    public function createShortLink(String $code = null)
    {
        return route('short', $code);
    }

    public function createStatsLink(String $code = null)
    {
        return route('stats', $code);
    }

    public function getOriginUrl($url)
    {
        return strpos($url, 'http') !== 0 ? "http://$url" : $url;
    }
}
