<?php

namespace PaymentExample\Client;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * A hypothetical Paypal client that doesn't actually do anything. :).
 */
class PaypalClient
{
    public function beginPaymentProcess(): UuidInterface
    {
        return Uuid::uuid4();
    }

    public function reserveAmount(UuidInterface $pendingPayment, int $amount): void
    {
        $this->log($pendingPayment, "Reserving $amount cents");
    }

    public function updateReservedAmount(UuidInterface $pendingPayment, int $amount): void
    {
        $this->log($pendingPayment, "Updating payment amount to $amount cents");
    }

    public function cancelAmountReservation(UuidInterface $pendingPayment): void
    {
        $this->log($pendingPayment, 'Cancelling payment reservation');
    }

    public function collectMoney(UuidInterface $pendingPayment): void
    {
        $this->log($pendingPayment, 'Collecting amount');
    }

    public function refundCollectedMoney(UuidInterface $pendingPayment): void
    {
        $this->log($pendingPayment, 'Refunding payment');
    }

    private function log(UuidInterface $pendingPayment, string $message): void
    {
        echo "[Paypal] $message for {$pendingPayment->toString()}.".PHP_EOL;
    }
}
