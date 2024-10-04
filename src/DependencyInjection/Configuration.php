<?php

namespace LegitHealth\MedicalDeviceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('legit_health_medical_device');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('api_url')->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
