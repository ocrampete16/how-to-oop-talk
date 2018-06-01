<?php

declare(strict_types=1);

namespace PaymentExample\PaymentProvider;

use PaymentExample\Order;

interface PaymentProvider
{
    public function reserveAmount(Order $order): void;

    public function updateReservedAmount(Order $order, int $amount): void;

    public function cancelAmountReservation(Order $order): void;

    public function collectMoney(Order $order): void;

    public function refundCollectedMoney(Order $order): void;
}
