<?php
declare(strict_types=1);

interface PaymentProvider
{
    public function setUp(): void;

    public function reserveAmount(Payment $payment): void;

    public function updateReservedAmount(Payment $payment, int $amount): void;

    public function cancelAmountReservation(Payment $payment): void;

    public function collectMoney(Payment $payment): void;

    public function refundCollectedMoney(Payment $payment): void;
}
