<?php

namespace App\Service\Generator;

use App\Service\Converter\ConverterInterface;

abstract class AbstractGenerator implements GeneratorInterface
{
    protected ?ConverterInterface $converter = null;

    public function setConverter(?ConverterInterface $converter): GeneratorInterface
    {
        $this->converter = $converter;

        return $this;
    }
}
