<?php

namespace App\Service\Generator;

use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem(index: 'array_string')]
class ArrayStringGenerator extends AbstractGenerator
{
    public function __construct(
        private StringGenerator $stringGenerator,
        private int $size,
        int $length,
    ) {
        $this->setLength($length);
    }

    public function generate(): array
    {
        $i = 0;
        $result = [];

        while ($i++ < $this->size) {
            $string = $this->stringGenerator->generate();

            $result[] = $this->converter ? $this->converter->convert($string) : $string;
        }

        return $result;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function setLength(int $length): self
    {
        $this->stringGenerator->setLength($length);

        return $this;
    }
}
