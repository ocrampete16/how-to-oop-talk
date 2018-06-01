<?php

declare(strict_types=1);

namespace PaymentExample;

// TODO: MoneyPHP
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

    // Merken: kein Setter, fehleranfällig -> withAmount ist besser
    public function withAmount(int $amount): self
    {
        return new DuePayment($amount);
    }
}
