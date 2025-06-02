<?php

namespace LegitHealth\MedicalDeviceBundle;

use LegitHealth\MedicalDevice\Common\BearerToken;
use LegitHealth\MedicalDevice\Arguments\{
    DiagnosisSupportArguments,
    SeverityAssessmentAutomaticLocalArguments,
    SeverityAssessmentManualArguments
};
use LegitHealth\MedicalDevice\MedicalDeviceClient as MedicalDeviceClientBase;
use LegitHealth\MedicalDevice\Response\{AccessToken, DiagnosisSupportResponse, SeverityAssessmentResponse};
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

    public function severityAssessmentAutomaticLocal(SeverityAssessmentAutomaticLocalArguments $arguments, BearerToken $bearerToken): SeverityAssessmentResponse
    {
        return $this->medicalDeviceClient->severityAssessmentAutomaticLocal($arguments, $bearerToken);
    }

    public function severityAssessmentManual(SeverityAssessmentManualArguments $arguments, BearerToken $bearerToken): SeverityAssessmentResponse
    {
        return $this->medicalDeviceClient->severityAssessmentManual($arguments, $bearerToken);
    }
}
