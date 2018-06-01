<?php

declare(strict_types=1);

namespace PaymentExample\PaymentProvider;

use PaymentExample\Client\PaypalClient;
use PaymentExample\Order;

class PaypalPaymentProvider implements PaymentProvider
{
    private $client;

    public function __construct(PaypalClient $client)
    {
        $this->client = $client;
    }

    public function reserveAmount(Order $order): void
    {
        $token = $this->client->beginPaymentProcess($order->getDuePayment()->getAmount());
        $order->startPaymentProcess($token);
        $this->client->reserveAmount($token, $order->getDuePayment()->getAmount());
    }

    public function updateReservedAmount(Order $order, int $amount): void
    {
        $token = $order->getPaymentProcessToken();
        $this->client->updateReservedAmount($token, $order->getDuePayment()->getAmount());
    }

    public function cancelAmountReservation(Order $order): void
    {
        $this->client->cancelAmountReservation($order->getPaymentProcessToken());
    }

    public function collectMoney(Order $order): void
    {
        $this->client->collectMoney($order->getPaymentProcessToken());
    }

    public function refundCollectedMoney(Order $order): void
    {
        $this->client->refundCollectedMoney($order->getPaymentProcessToken());
    }
}
