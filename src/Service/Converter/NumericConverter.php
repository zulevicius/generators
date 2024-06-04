<?php

namespace App\Service\Converter;

use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem(index: 'numeric')]
class NumericConverter implements ConverterInterface
{
    public function convert(string $input): string
    {
        $output = '';
        $input = str_split($input);

        for ($i = 0, $iMax = count($input); $i < $iMax; $i++) {
            $char = $input[$i];
            $separatorAdded = false;

            if (ctype_alpha($input[$i - 1] ?? '')) {
                $separatorAdded = true;
                $output .= '/';
            }

            if (ctype_digit($char)) {
                $output .= $char;
            }

            if (ctype_lower($char)) {
                $firstLetter = 'a';
            } elseif (ctype_upper($char)) {
                $firstLetter = 'A';
            } else {
                continue;
            }

            if ($output && !$separatorAdded) {
                $output .= '/';
            }

            $output .= ord($char) - ord($firstLetter) + 1;
        }

        return $output;
    }
}
