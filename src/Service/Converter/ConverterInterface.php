<?php

namespace App\Service\Converter;

interface ConverterInterface
{
    public function convert(string $input): string;
}
