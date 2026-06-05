<?php

declare(strict_types=1);

namespace Plaidly\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Plaidly\PaymentSessions;
use Plaidly\PlaidlyClient;
use Plaidly\Tests\Support\RecordingHttpClient;

final class PlaidlyClientTest extends TestCase
{
    private function client(RecordingHttpClient $http): PlaidlyClient
    {
        return new PlaidlyClient(http: $http);
    }

    #[Test]
    public function constructorRejectsEmptyApiKeyWithoutTransport(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new PlaidlyClient('');
    }

    #[Test]
    public function createPaymentSessionSendsContractBody(): void
    {
        $http = (new RecordingHttpClient())->willReturn([
            'session_id' => 'ps_1',
            'address'    => '0xabc',
            'status'     => 'pending',
        ]);

        $session = $this->client($http)->paymentSessions->create(
            amount: 100.0,
            expiresIn: '15m',
            chain: 'ethereum',
            token: 'USDC',
            network: 'mainnet',
            metadata: ['order_id' => 'A-1'],
        );

        self::assertSame('ps_1', $session['session_id']);

        $call = $http->lastCall();
        self::assertSame('POST', $call['method']);
        self::assertSame('/v1/payment_sessions', $call['path']);
        self::assertSame(
            [
                'amount'        => 100.0,
                'expires_in'    => '15m',
                'paymentMethod' => [
                    'methodID' => PaymentSessions::METHOD_CRYPTO,
                    'chain'    => 'ethereum',
                    'token'    => 'USDC',
                    'network'  => 'mainnet',
                ],
                'metadata'      => ['order_id' => 'A-1'],
            ],
            $call['body'],
        );
    }

    #[Test]
    public function createPaymentSessionOmitsMetadataWhenEmpty(): void
    {
        $http = new RecordingHttpClient();

        $this->client($http)->paymentSessions->create(
            amount: 5.0,
            expiresIn: '1h',
            chain: 'solana',
            token: 'SOL',
        );

        $body = $http->lastCall()['body'];
        self::assertArrayNotHasKey('metadata', $body);
        self::assertSame('mainnet', $body['paymentMethod']['network']);
    }

    #[Test]
    public function getPaymentSessionUsesSnakeCasePath(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->paymentSessions->get('ps abc/1');

        self::assertSame('GET', $http->lastCall()['method']);
        self::assertSame('/v1/payment_sessions/ps%20abc%2F1', $http->lastCall()['path']);
    }

    #[Test]
    public function createDemoOmitsNullFields(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->paymentSessions->createDemo(chain: 'tron', amount: 2.5);

        $call = $http->lastCall();
        self::assertSame('/v1/payment_sessions/demo', $call['path']);
        self::assertSame(['chain' => 'tron', 'amount' => 2.5], $call['body']);
    }

    #[Test]
    public function simulatePostsToSimulatePath(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->paymentSessions->simulate('ps_1');

        self::assertSame('POST', $http->lastCall()['method']);
        self::assertSame('/v1/payment_sessions/ps_1/simulate', $http->lastCall()['path']);
    }

    #[Test]
    public function registerMerchantSendsNameAndWebhook(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->merchants->register('Acme', 'https://acme.test/hook');

        $call = $http->lastCall();
        self::assertSame('/v1/merchants', $call['path']);
        self::assertSame(['name' => 'Acme', 'webhook_url' => 'https://acme.test/hook'], $call['body']);
    }

    #[Test]
    public function registerMerchantOmitsWebhookWhenNull(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->merchants->register('Acme');

        self::assertSame(['name' => 'Acme'], $http->lastCall()['body']);
    }

    #[Test]
    public function meHitsMeEndpoint(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->merchants->me();

        self::assertSame('GET', $http->lastCall()['method']);
        self::assertSame('/v1/me', $http->lastCall()['path']);
    }

    #[Test]
    public function payoutSendsContractBody(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->payouts->create('0xdef', 12.5, 'ETH', 'ethereum');

        $call = $http->lastCall();
        self::assertSame('/v1/payouts', $call['path']);
        self::assertSame(
            [
                'destination_address' => '0xdef',
                'amount'              => 12.5,
                'token_symbol'        => 'ETH',
                'network'             => 'ethereum',
            ],
            $call['body'],
        );
    }

    #[Test]
    public function paymentMethodsListIsPublicGet(): void
    {
        $http = (new RecordingHttpClient())->willReturn([
            ['chain' => 'ethereum', 'token' => 'USDC'],
        ]);

        $methods = $this->client($http)->paymentMethods->list();

        self::assertSame('/v1/payment_methods', $http->lastCall()['path']);
        self::assertSame('ethereum', $methods[0]['chain']);
    }

    #[Test]
    public function ratesPassSymbolsAsQuery(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->rates->get(['ETH', 'SOL']);

        $call = $http->lastCall();
        self::assertSame('/v1/rates', $call['path']);
        self::assertSame(['symbols' => 'ETH,SOL'], $call['query']);
    }

    #[Test]
    public function ratesWithoutSymbolsSendNoQuery(): void
    {
        $http = new RecordingHttpClient();
        $this->client($http)->rates->get();

        self::assertSame([], $http->lastCall()['query']);
    }

    #[Test]
    public function faucetsHitSandboxEndpoint(): void
    {
        $http = (new RecordingHttpClient())->willReturn(['ethereum:testnet' => 'https://faucet.test']);
        $faucets = $this->client($http)->sandbox->faucets();

        self::assertSame('/v1/sandbox/faucets', $http->lastCall()['path']);
        self::assertSame('https://faucet.test', $faucets['ethereum:testnet']);
    }
}
