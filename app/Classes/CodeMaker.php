<?php

namespace App\Classes;

use App\Models\Short_urls;
use App\Models\Statisticts;
use Illuminate\Support\Str;

class CodeMaker
{
    private $code;
    private $length;

    public function __construct()
    {
        $this->length = 4;
        $this->createCode();
    }

    public function getCode(int $length = null)
    {
        $this->checkNewGenerate($length);
        return $this->code;
    }

    protected function createCode()
    {
        do {
            $this->code = $this->generateCode();
        } while($this->checkCodeInDB());
    }

    protected function generateCode()
    {
        return Str::random($this->length);
    }

    protected function checkCodeInDB()
    {
        return Short_urls::where('code', $this->code)->first();
    }

    protected function checkNewGenerate($length)
    {
        if($length !== $this->length && ($length >= 3 && $length <= 10))  {
            $this->length = $length;
            $this->createCode();
        }
    }
}
