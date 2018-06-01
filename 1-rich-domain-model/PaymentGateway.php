<?php
declare(strict_types=1);

class PaymentGateway
{
    private $paymentProvider;

    public function __construct(PaymentProvider $paymentProvider)
    {
        $this->paymentProvider = $paymentProvider;
    }

    public function reserveAmount(Order $order): void
    {
        $this->paymentProvider->reserveAmount($order->getPayment());
    }

    public function updateReservedAmount(Order $order, int $amount): void
    {
        $this->paymentProvider->updateReservedAmount($order->getPayment(), $amount);
    }

    public function cancelAmountReservation(Order $order): void
    {
        $this->paymentProvider->cancelAmountReservation($order->getPayment());
    }

    public function collectMoney(Order $order): void
    {
        $this->paymentProvider->collectMoney($order->getPayment());
    }

    public function refundCollectedMoney(Order $order): void
    {
        $this->paymentProvider->refundCollectedMoney($order->getPayment());
    }
}
