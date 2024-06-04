<?php

namespace App\Service\Generator;

use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem(index: 'string')]
class StringGenerator extends AbstractGenerator
{
    public function __construct(
        private string $chars,
        private int $length,
    ) {
    }

    public function generate(): string
    {
        $result = '';

        for ($i = 0, $interval = strlen($this->chars) - 1; $i < $this->length; $i++) {
            $result .= $this->chars[rand(0, $interval)];
        }

        return $this->converter ? $this->converter->convert($result) : $result;
    }

    public function setChars(string $chars): self
    {
        $this->chars = $chars;

        return $this;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }
}
