<?php

namespace App\Models;

use App\Classes\TimeParser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statisticts extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_id',
        'country',
        'city',
        'browser_type',
        'browser_version',
        'platform_type',
        'platform_version',
        'user_agent',
    ];

    /**
     * Beauty user-agent name
     *
     * @return string
     */
    public function getBeautyUserAgentAttribute()
    {
        return "{$this->browser_type}, {$this->browser_version}, {$this->platform_type}";
    }

    public function getOpenTimeDaysAttribute()
    {
        $timeParser = new TimeParser();
        return $timeParser->parseEndedTimeDays($this->created_at);
    }

    public function getOpenTimeHoursAttribute()
    {
        $timeParser = new TimeParser();
        return $timeParser->parseEndedTimeHours($this->created_at);
    }
}
