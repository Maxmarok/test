<?php

namespace App\Classes;

use App\Models\Short_urls;
use Illuminate\Support\Str;

class CodeMaker
{
    private $code;
    private $length;
    private $slice;

    public function __construct()
    {
        $this->length = 10;
        $this->slice = 4;
        $this->createCode();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getShortCode(int $slice = null)
    {
        if($slice && ($slice > 3 || $slice < 8)) $this->slice = $slice;
        return $this->sliceCode();
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

    protected function sliceCode()
    {
        return substr($this->code, 0, $this->slice);
    }
}
