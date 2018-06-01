<?php

declare(strict_types=1);

namespace PaymentExample;

use Ramsey\Uuid\UuidInterface;

class Order
{
    // TODO: verwenden!
    public const STATUS_OPEN = 'OPEN';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_CANCELED = 'CANCELED';
    public const STATUS_PAID = 'PAID';
    public const STATUS_REFUNDED = 'REFUNDED';

    private $duePayment;
    private $paymentProcessToken = null;

    private function __construct(DuePayment $duePayment)
    {
        $this->duePayment = $duePayment;
    }

    public static function withDuePayment(DuePayment $duePayment): self
    {
        return new self($duePayment);
    }

    public function getDuePayment(): DuePayment
    {
        return $this->duePayment;
    }

    public function setDuePayment(DuePayment $duePayment): void
    {
        $this->duePayment = $duePayment;
    }

    public function paymentIsPending(): bool
    {
        return null !== $this->paymentProcessToken;
    }

    public function startPaymentProcess(UuidInterface $paymentProcessToken): void
    {
        if ($this->paymentIsPending()) {
            throw new \LogicException('There is already a payment being processed!');
        }

        $this->paymentProcessToken = $paymentProcessToken;
    }

    public function getPaymentProcessToken(): UuidInterface
    {
        if (!$this->paymentIsPending()) {
            throw new \LogicException('No payment process has beens started yet!');
        }

        return $this->paymentProcessToken;
    }
}
