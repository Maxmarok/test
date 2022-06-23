<?php

namespace App\Http\Controllers;

use App\Classes\CodeMaker;
use App\Classes\TimeParser;
use App\Classes\UrlGenerator;
use App\Classes\UserInfo;
use App\Http\Requests\CreateUrlRequest;
use App\Models\Secret_codes;
use App\Models\Short_urls;
use App\Models\Statisticts;

class UrlController extends Controller
{
    public function createUrl(CreateUrlRequest $request)
    {
        $arr = $request->validated();
        $url = $this->createShortLink($arr);
        $secretCode = $this->createSecretCode($url);

        return redirect()->route('stats', $secretCode)->with('success', 'Ссылка успешно уменьшена!');
    }

    public function redirectUser($code)
    {
        $shortUrl = $this->getShortUrl($code);
        $redirectUrl = $this->getRedirectUrl($shortUrl);

        return redirect($redirectUrl);
    }

    public function createSecretCode(Object $url)
    {
        $secretCodeArr = [
            'url_id' => $url->id,
            'code' => $url->code,
        ];

        $secretCode = Secret_codes::create($secretCodeArr);
        return $secretCode->code;
    }

    protected function getRedirectUrl($url)
    {
        $urlGenerator = new UrlGenerator();
        $originUrl = $urlGenerator->getOriginUrl($url->origin_url);
        $this->createStatistics($url->id);
        return $originUrl;
    }

    public function createStatistics(String $urlId)
    {
        $info = new UserInfo();

        $arr = [
            'url_id'            => $urlId,
            'country'           => $info->getCountry(),
            'city'              => $info->getCity(),
            'browser_type'      => $info->getBrowserType(),
            'browser_version'   => $info->getBrowserVersion(),
            'platform_type'     => $info->getPlatformType(),
            'platform_version'  => $info->getPlatformVersion(),
            'user_agent'        => $info->getUserAgent(),
        ];

        return Statisticts::create($arr);
    }

    protected function getEndedAt($arr)
    {
        if(isset($arr['ended_at']) && !isset($arr['endless'])) {
            $timeParser = new TimeParser();
            return $timeParser->getDateFromFormat($arr['ended_at']);
        }

        return null;
    }

    protected function createShortLink($arr)
    {
        $codeMaker = new CodeMaker();
        $arr['code'] = $codeMaker->getCode();
        $arr['ended_at'] = $this->getEndedAt($arr);

        return Short_urls::create($arr);
    }

    protected function getShortUrl($code)
    {
        $shortUrl = Short_urls::code($code)->first();
        $timeParser = new TimeParser();

        if(!$shortUrl || ($shortUrl->ended_at && !$timeParser->checkTimeWithNow($shortUrl->ended_at))) {
            return redirect()->route('main')->with('error', 'Время жизни ссылки закончилось, запросите новую ссылку у автора');
        }

        return $shortUrl;
    }
}
