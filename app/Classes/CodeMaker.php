<?php

namespace App\Classes;

use Illuminate\Support\Str;

class CodeMaker
{
    private $code;

    public function __construct()
    {
        $this->createCode();
    }

    public function getCode()
    {
        return $this->code;
    }

    protected function createCode()
    {
        $this->code = $this->generateCode();
    }

    protected function generateCode()
    {
        return str_replace('-', '', Str::uuid(10));
    }
}
