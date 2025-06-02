<?php

namespace LegitHealth\MedicalDeviceBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class LegitHealthMedicalDeviceBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
            ->scalarNode('api_url')->end()
            ->end()
            ->end();
    }

    public function build(ContainerBuilder $containerBuilder): void
    {
        parent::build($containerBuilder);
    }

    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $containerConfigurator->import('../config/services.xml');

        $containerConfigurator->services()->set('medical_device.http.client', HttpClient::class)
            ->factory([HttpClientFactory::class, 'withConfig'])
            ->args([$config['api_url']])
            ->tag('http_client.client');

        $containerConfigurator->services()
            ->get('LegitHealth\MedicalDeviceBundle\MedicalDeviceClient')
            ->arg(0, new Reference('medical_device.http.client'));
    }
}
