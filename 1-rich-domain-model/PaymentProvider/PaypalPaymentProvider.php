<?php

declare(strict_types=1);

namespace PaymentExample\PaymentProvider;

use Money\Money;
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

        $this->client->reserveAmount($payment->getProcessToken(), $payment->getAmount());
    }

    public function updateReservedAmount(Payment $payment, Money $amount): void
    {
        $payment->updateAmount($amount);

        $this->client->updateReservedAmount($payment->getProcessToken(), $payment->getAmount());
    }

    public function cancelAmountReservation(Payment $payment): void
    {
        $payment->cancel();

        $this->client->cancelAmountReservation($payment->getProcessToken());
    }

    public function collectMoney(Payment $payment): void
    {
        $payment->pay();

        $this->client->collectMoney($payment->getProcessToken());
    }

    public function refundCollectedMoney(Payment $payment): void
    {
        $payment->refund();

        $this->client->refundCollectedMoney($payment->getProcessToken());
    }
}
