<?php

namespace LegitHealth\MedicalDeviceBundle;

use LegitHealth\MedicalDevice\MedicalDeviceArguments\{BearerToken, DiagnosisSupportArguments, SeverityAssessmentArguments};
use LegitHealth\MedicalDevice\MedicalDeviceClient as MedicalDeviceClientBase;
use LegitHealth\MedicalDevice\MedicalDeviceResponse\{AccessToken, DiagnosisSupportResponse, SeverityAssessmentResponse};
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MedicalDeviceClient
{
    private MedicalDeviceClientBase $medicalDeviceClient;

    public function __construct(private HttpClientInterface $httpClient)
    {
        $this->medicalDeviceClient = MedicalDeviceClientBase::createWithHttpClient($httpClient);
    }

    public function login(string $username, string $password): AccessToken
    {
        return $this->medicalDeviceClient->login($username, $password);
    }

    public function diagnosisSupport(DiagnosisSupportArguments $arguments, BearerToken $bearerToken): DiagnosisSupportResponse
    {
        return $this->medicalDeviceClient->diagnosisSupport($arguments, $bearerToken);
    }

    public function severityAssessment(SeverityAssessmentArguments $arguments, BearerToken $bearerToken): SeverityAssessmentResponse
    {
        return $this->medicalDeviceClient->severityAssessment($arguments, $bearerToken);
    }
}
