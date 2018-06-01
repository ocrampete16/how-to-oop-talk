<?php

declare(strict_types=1);

namespace PaymentExample\PaymentProvider;

use PaymentExample\Client\PaypalClient;
use PaymentExample\Payment;

class PaypalPaymentProvider
{
    private $client;

    public function __construct(PaypalClient $client)
    {
        $this->client = $client;
    }

    public function reserveAmount(Payment $payment): void
    {
        $token = $this->client->beginPaymentProcess();
        $payment->start($token);
        $this->client->reserveAmount($token, $payment->getAmount());
    }

    public function updateReservedAmount(Payment $payment): void
    {
        $this->client->updateReservedAmount($payment->getProcessToken(), $payment->getAmount());
    }

    public function cancelAmountReservation(Payment $payment): void
    {
        $this->client->cancelAmountReservation($payment->getProcessToken());
    }

    public function collectMoney(Payment $payment): void
    {
        $this->client->collectMoney($payment->getProcessToken());
    }

    public function refundCollectedMoney(Payment $payment): void
    {
        $this->client->refundCollectedMoney($payment->getProcessToken());
    }
}
