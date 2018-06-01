<?php

declare(strict_types=1);

namespace PaymentExample;

class DuePayment
{
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        return new DuePayment($amount);
    }
}
