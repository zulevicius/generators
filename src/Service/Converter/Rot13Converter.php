<?php

namespace App\Service\Converter;

use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem(index: 'rot13')]
class Rot13Converter implements ConverterInterface
{
    public function convert(string $input): string
    {
        return str_rot13($input);
    }
}
