<?php

namespace App\Tests\Service\Converter;

use App\Service\Converter\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13ConverterTest extends TestCase
{
    public function testConvert()
    {
        $result = (new Rot13Converter())->convert('32AvfF1X12Es');

        $this->assertEquals('32NisS1K12Rf', $result);
    }
}
