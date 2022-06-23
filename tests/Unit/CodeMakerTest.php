<?php

namespace Tests\Unit;

use App\Classes\CodeMaker;
use Tests\TestCase;

class CodeMakerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $codeMaker;

    public function setUp() :void
    {
        parent::setUp();
        $this->codeMaker = new CodeMaker();
    }

    public function testCodeGenerate()
    {
        $code = $this->codeMaker->getCode();
        $this->assertIsString($code);
    }
}
