<?php

namespace App\Tests\Service\Generator;

use App\Service\Generator\ArrayStringGenerator;
use App\Service\Generator\StringGenerator;
use PHPUnit\Framework\TestCase;

class ArrayStringGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $stringGenerator = new StringGenerator('abcABC123', 5);
        $generator = new ArrayStringGenerator($stringGenerator, 3, 8);

        $result = $generator->generate();

        $this->assertCount(3, $result);

        foreach ($result as $string) {
            $this->assertEquals(8, strlen($string));
        }
    }
}
