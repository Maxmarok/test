<?php

namespace App\Models;

use App\Classes\TimeParser;
use App\Classes\UrlGenerator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Short_urls extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'origin_url', 'ended_at',
    ];

    public $timestamps = [
        'ended_at'
    ];

    public function scopeCode($q, $code)
    {
        return $q->where('code', $code);
    }

    public function getShortUrlAttribute()
    {
        $shorlUrl = new UrlGenerator();
        return $shorlUrl->createShortLink($this->code);
    }

    public function getFullUrlAttribute()
    {
        $shorlUrl = new UrlGenerator();
        return $shorlUrl->getOriginUrl($this->origin_url);
    }

    public function getEndedTimeAttribute()
    {
        $timeParser = new TimeParser();
        return $this->ended_at ? $timeParser->parseEndedTimeFull($this->ended_at) : 'Бессрочно';
    }
}
