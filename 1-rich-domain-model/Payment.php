<?php

declare(strict_types=1);

namespace PaymentExample;

use Money\Money;
use Ramsey\Uuid\UuidInterface;

class Payment
{
    public const STATUS_OPEN = 'OPEN';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_CANCELED = 'CANCELED';
    public const STATUS_PAID = 'PAID';
    public const STATUS_REFUNDED = 'REFUNDED';

    private $amount;
    private $status;
    /** @var UuidInterface */
    private $processToken;

    private function __construct(Money $amount)
    {
        $this->amount = $amount;
        $this->status = self::STATUS_OPEN;
    }

    public static function withAmount(Money $amount): self
    {
        return new self($amount);
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function setAmount(Money $amount): void
    {
        $this->amount = $amount;
    }

    public function getProcessToken(): UuidInterface
    {
        if (self::STATUS_OPEN === $this->status) {
            throw new \LogicException('Only open proce');
        }

        return $this->processToken;
    }

    public function start(UuidInterface $processToken): void
    {
        if (self::STATUS_OPEN !== $this->status) {
            throw new \LogicException('Only open payments can be started.');
        }

        $this->processToken = $processToken;
        $this->status = self::STATUS_PENDING;
    }

    public function cancel(): void
    {
        if (self::STATUS_PENDING !== $this->status) {
            throw new \LogicException('Only pending payments can be canceled.');
        }

        $this->status = self::STATUS_CANCELED;
    }

    public function pay(): void
    {
        if (self::STATUS_PENDING !== $this->status) {
            throw new \LogicException('Only pending payments can be paid.');
        }

        $this->status = self::STATUS_PAID;
    }

    public function refund(): void
    {
        if (self::STATUS_PAID !== $this->status) {
            throw new \LogicException('Only payments that have been paid can be refunded.');
        }

        $this->status = self::STATUS_REFUNDED;
    }
}
