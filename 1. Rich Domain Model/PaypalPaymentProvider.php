<?php
declare(strict_types=1);

class PaypalPaymentProvider implements PaymentProvider
{
    private $client;

    public function __construct(PaypalClient $client)
    {
        $this->client = $client;
    }

    public function setUp(): void
    {
        // TODO: Implement setUp() method.
    }

    public function reserveAmount(Payment $payment): void
    {
        // TODO: Implement reserveAmount() method.
    }

    public function updateReservedAmount(Payment $payment, int $amount): void
    {
        // TODO: Implement updateReservedAmount() method.
    }

    public function cancelAmountReservation(Payment $payment): void
    {
        // TODO: Implement cancelAmountReservation() method.
    }

    public function collectMoney(Payment $payment): void
    {
        // TODO: Implement collectMoney() method.
    }

    public function refundCollectedMoney(Payment $payment): void
    {
        // TODO: Implement refundCollectedMoney() method.
    }
}
