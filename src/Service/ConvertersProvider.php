<?php

namespace App\Service;

use App\Service\Converter\ConverterInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class ConvertersProvider
{
    /**
     * @var ConverterInterface[]
     */
    private array $converters;

    public function __construct(
        #[TaggedIterator('app.converter', indexAttribute: 'key')]
        iterable $converters,
    ) {
        $this->converters = $converters instanceof \Traversable ? iterator_to_array($converters) : $converters;
    }

    public function get(): array
    {
        return $this->converters;
    }

    public function find(string $key): ?ConverterInterface
    {
        return $this->converters[$key] ?? throw new \InvalidArgumentException("Converter `$key` not found.");
    }
}
