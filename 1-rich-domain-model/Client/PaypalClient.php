<?php

namespace PaymentExample\Client;

use Money\Money;
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

    public function reserveAmount(UuidInterface $processToken, Money $amount): void
    {
        $this->log($processToken, "Reserving {$amount->getAmount()} cents");
    }

    public function updateReservedAmount(UuidInterface $processToken, Money $amount): void
    {
        $this->log($processToken, "Updating payment amount to {$amount->getAmount()} cents");
    }

    public function cancelAmountReservation(UuidInterface $processToken): void
    {
        $this->log($processToken, 'Cancelling payment reservation');
    }

    public function collectMoney(UuidInterface $processToken): void
    {
        $this->log($processToken, 'Collecting amount');
    }

    public function refundCollectedMoney(UuidInterface $processToken): void
    {
        $this->log($processToken, 'Refunding payment');
    }

    private function log(UuidInterface $processToken, string $message): void
    {
        echo "[Paypal] $message for {$processToken->toString()}.".PHP_EOL;
    }
}
