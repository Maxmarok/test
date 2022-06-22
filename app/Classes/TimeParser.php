<?php

namespace App\Classes;

use Carbon\Carbon;

class TimeParser
{
    public function getDateFromFormat($time)
    {
        return Carbon::createFromFormat('d.m.Y', $time);
    }

    public function checkTimeWithNow($time)
    {
        return $time && ($time > now()); // true is less than now, false is more than now
    }

    public function parseEndedTimeFull($time)
    {
        return Carbon::parse($time)->timezone('Europe/Moscow')->translatedFormat('d.m.Y H:i:s');
    }

    public function parseEndedTimeDays($time)
    {
        return Carbon::parse($time)->timezone('Europe/Moscow')->translatedFormat('d.m.Y');
    }

    public function parseEndedTimeHours($time)
    {
        return Carbon::parse($time)->timezone('Europe/Moscow')->translatedFormat('H:i:s');
    }
}
