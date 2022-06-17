<?php

namespace Tests\Unit;

use App\Classes\TimeParser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;

class TimeParserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $timeParser;
    protected $time;
    protected $datetimeFull;
    protected $datetimeDays;
    protected $datetimeHour;

    public function setUp() :void
    {
        parent::setUp();

        $this->timeParser      = new TimeParser();
        $this->time            = Carbon::now()->timezone('Europe/Moscow')->addHour();
        $this->datetimeFull    = $this->time->format('d.m.Y H:i:s');
        $this->datetimeDays    = $this->time->format('d.m.Y');
        $this->datetimeHours   = $this->time->format('H:i:s');
    }

    public function testGetDateFromFormat()
    {
        $res = Carbon::make($this->timeParser->getDateFromFormat($this->datetimeDays))->toDateTimeString();
        $now = Carbon::make(now())->toDateTimeString();
        $this->assertEquals($now, $res);
    }

    public function testCheckTimeWithNow()
    {
        $res = $this->timeParser->checkTimeWithNow($this->time);
        $this->assertTrue($res);
    }

    public function testParseEndedTimeFull()
    {
        $res = $this->timeParser->parseEndedTimeFull($this->time);
        $this->assertEquals($this->datetimeFull, $res);
    }

    public function testParseEndedTimeDays()
    {
        $res = $this->timeParser->parseEndedTimeDays($this->time);
        $this->assertEquals($this->datetimeDays, $res);
    }

    public function testParseEndedTimeHours()
    {
        $res = $this->timeParser->parseEndedTimeHours($this->time);
        $this->assertEquals($this->datetimeHours, $res);
    }
}
