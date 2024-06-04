<?php

namespace App\Controller;

use App\Service\ConvertersProvider;
use App\Service\Generator\GeneratorInterface;
use App\Service\GeneratorsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    public function __invoke(
        ConvertersProvider $convertersProvider,
        GeneratorsProvider $generatorsProvider,
    ): Response {
        $generators = $generatorsProvider->get();
        $converters = $convertersProvider->get();

        /** @var GeneratorInterface[] $randomGenerators */
        $randomGenerators = [];
        $i = 0;
        $iMax = rand(1, 3);

        while ($i++ < $iMax) {
            $randomGenerators[] = $generators[array_rand($generators)];
        }

        $result = [];

        foreach ($randomGenerators as $generator) {
            $converter = $converters[array_rand($converters)];

            $generator->setConverter($converter);

            $result[] = $generator->generate();
        }

        return new Response('<pre>' . print_r($result, true) . '</pre>');
    }
}
