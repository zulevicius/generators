<?php

namespace App\Service\Generator;

use App\Service\Converter\ConverterInterface;

interface GeneratorInterface
{
    public function generate(): mixed;
    public function setConverter(?ConverterInterface $converter): self;
}
