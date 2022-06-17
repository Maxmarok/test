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
    public function createShortLink(CreateUrlRequest $request)
    {
        $arr = $request->validated();
        $codeMaker = new CodeMaker();

        $arr['code'] = $codeMaker->getCode();

        if(isset($arr['ended_at']) && !isset($arr['endless'])) {
            $timeParser = new TimeParser();
            $arr['ended_at'] = $timeParser->getDateFromFormat($arr['ended_at']);
        }

        $url = Short_urls::create($arr);
        $statsCode = $this->createSecretCode($url->id);

        return redirect()->route('stats', $statsCode)->with('success', 'Ссылка успешно уменьшена!');
    }

    public function redirectUser($code)
    {
        $shortUrl = Short_urls::code($code)->first();
        $timeParser = new TimeParser();

        if(!$shortUrl || !$timeParser->checkTimeWithNow($shortUrl->ended_at)) {
            return redirect()->route('main')->with('error', 'Время жизни ссылки закончилось, запросите новую ссылку у автора');
        }

        $urlGenerator = new UrlGenerator();
        $originUrl = $urlGenerator->getOriginUrl($shortUrl->origin_url);
        $this->createStatistics($shortUrl->id);

        return redirect($originUrl);
    }

    public function createSecretCode(String $url)
    {
        $codeMaker = new CodeMaker();

        $secretCode = [
            'url_id' => $url,
            'code' => $codeMaker->getCode(),
        ];

        $url = Secret_codes::create($secretCode);
        return $url->code;
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
}
