<?php

namespace Tests;

use Mockery as m;
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Controller\Code;
use PayPay\OpenPaymentAPI\Controller\Payment;
use Revolution\PayPay\Contracts\Factory;
use Revolution\PayPay\Facades\PayPay;
use Revolution\PayPay\PayPayClient;

class PayPayTest extends TestCase
{
    public function test_instance()
    {
        $client = new PayPayClient(m::mock(Client::class));

        $this->assertInstanceOf(PayPayClient::class, $client);
    }

    public function test_container()
    {
        $client = app(Factory::class);

        $this->assertInstanceOf(PayPayClient::class, $client);
    }

    public function test_client_using()
    {
        $mock = m::mock(Client::class);

        $client = PayPay::clientUsing($mock);

        $this->assertEquals($client->client(), $mock);
        $this->assertInstanceOf(Client::class, $client->client());
    }

    public function test_client_using_callable()
    {
        $client = PayPay::clientUsing(function () {
            return m::mock(Client::class);
        });

        $this->assertInstanceOf(Client::class, $client->client());
    }

    public function test_code_controller()
    {
        $code = PayPay::code();

        $this->assertNotNull($code);
        $this->assertInstanceOf(Code::class, $code);
    }

    public function test_payment_controller()
    {
        $payment = PayPay::payment();

        $this->assertNotNull($payment);
        $this->assertInstanceOf(Payment::class, $payment);
    }

    public function test_bad_method_call()
    {
        $this->expectException(\BadMethodCallException::class);

        PayPay::test();
    }
}
