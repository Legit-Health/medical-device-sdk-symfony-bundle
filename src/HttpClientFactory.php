<?php

namespace LegitHealth\MedicalDeviceBundle;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientFactory
{

    public static function withConfig(string $baseUri): HttpClientInterface
    {
        return HttpClient::createForBaseUri($baseUri);
    }
}
