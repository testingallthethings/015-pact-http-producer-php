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
            ->setProviderVersion("1.0.0")
            ->setProviderBaseUrl(new Uri("http://localhost:8080"))
            ->setBrokerUri(new Uri("http://localhost:9292"))
            ->setPublishResults(true);

        $verifier = new Verifier($config);
        $verifier->verifyAll();

        $this->assertTrue(true);
    }

}