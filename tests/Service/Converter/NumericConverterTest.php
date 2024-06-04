<?php

namespace App\Tests\Service\Converter;

use App\Service\Converter\NumericConverter;
use PHPUnit\Framework\TestCase;

class NumericConverterTest extends TestCase
{
    public function testConvert()
    {
        $result = (new NumericConverter())->convert('32AvfF1X12Es');

        $this->assertEquals('32/1/22/6/6/1/24/12/5/19', $result);
    }
}
