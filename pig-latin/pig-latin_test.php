<?php
require_once "pig-latin.php";

class PigLatinTest extends PHPUnit_Framework_TestCase
{
    public function testWordBeginningWithP()
    {
        $this->assertEquals("igpay", PigLatin::translate("pig"));
    }

    public function testWordBeginningWithK()
    {
        $this->assertEquals("oalakay", PigLatin::translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->assertEquals("ellowyay", PigLatin::translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->assertEquals("enonxay", PigLatin::translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->assertEquals("appleay", PigLatin::translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->assertEquals("earay", PigLatin::translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->assertEquals("iglooay", PigLatin::translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->assertEquals("objectay", PigLatin::translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->assertEquals("underay", PigLatin::translate("under"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->assertEquals("atqay", PigLatin::translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->assertEquals("airchay", PigLatin::translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->assertEquals("eenquay", PigLatin::translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->assertEquals("aresquay", PigLatin::translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->assertEquals("erapythay", PigLatin::translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->assertEquals("ushthray", PigLatin::translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->assertEquals("oolschay", PigLatin::translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->assertEquals("yttriaay", PigLatin::translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->assertEquals("xrayay", PigLatin::translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->assertEquals("ickquay astfay unray", PigLatin::translate("quick fast run"));
    }
}
