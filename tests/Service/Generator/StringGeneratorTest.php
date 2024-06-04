<?php

namespace App\Tests\Service\Generator;

use App\Service\Generator\StringGenerator;
use PHPUnit\Framework\TestCase;

class StringGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $stringGenerator = new StringGenerator('abcABC123', 7);
        $string = $stringGenerator->generate();

        $this->assertEquals(7, strlen($string));

        foreach (str_split('defghijklmnopqrstuvwxyzDEFGHIJKLMNOPQRSTUVWXYZ0456789') as $char) {
            $this->assertStringNotContainsString($char, $string);
        }
    }
}
