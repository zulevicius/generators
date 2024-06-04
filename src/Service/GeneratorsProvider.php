<?php

namespace App\Service;

use App\Service\Generator\GeneratorInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class GeneratorsProvider
{
    /**
     * @var GeneratorInterface[]
     */
    private array $generators;

    public function __construct(
        #[TaggedIterator('app.generator', indexAttribute: 'key')]
        iterable $generators,
    ) {
        $this->generators = $generators instanceof \Traversable ? iterator_to_array($generators) : $generators;
    }

    public function get(): array
    {
        return $this->generators;
    }

    public function find(string $key): ?GeneratorInterface
    {
        return $this->generators[$key] ?? throw new \InvalidArgumentException("Generator `$key` not found.");
    }
}
