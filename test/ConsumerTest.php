<?php
namespace Braddle;

use GuzzleHttp\Psr7\Uri;
use PhpPact\Standalone\ProviderVerifier\Model\VerifierConfig;
use PhpPact\Standalone\ProviderVerifier\Verifier;
use PHPUnit\Framework\TestCase;

class ConsumerTest extends TestCase
{
    public function testPersonConsumer()
    {
        $config = new VerifierConfig();
        $config->setProviderName("personProvider")
            ->setProviderVersion(exec('git rev-parse --short HEAD'))
            ->setProviderBranch(exec('git rev-parse --abbrev-ref HEAD'))
            ->setProviderBaseUrl(new Uri("http://localhost:8080"))
            ->setBrokerUri(new Uri("http://localhost:9292"))
            ->setPublishResults(true);

        $verifier = new Verifier($config);
        $verifier->verifyAll();
        // $verifier->verifyFiles([__DIR__ . '/../pacts/personconsumer-personprovider.json']);
        // You can verify the local file, but ensure you don't have setPublishResults to true, as pact-php doesn't stop verifications
        // being published

        $this->assertTrue(true);
    }

}