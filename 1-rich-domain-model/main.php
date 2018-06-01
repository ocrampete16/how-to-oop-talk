<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Money\Money;
use PaymentExample\Client\PaypalClient;
use PaymentExample\Payment;
use PaymentExample\PaymentProvider\Exception\AmountCouldNotBeReserved;
use PaymentExample\PaymentProvider\Exception\MoneyCouldNotBeCollected;
use PaymentExample\PaymentProvider\Exception\MoneyCouldNotBeRefunded;
use PaymentExample\PaymentProvider\Exception\ReservedAmountCouldNotBeUpdated;
use PaymentExample\PaymentProvider\PaypalPaymentProvider;

$payment = Payment::withAmount(Money::EUR(1200));
$paymentProvider = new PaypalPaymentProvider(new PaypalClient());

try {
    // We just received an order! Let's reserve the amount for now.
    $paymentProvider->reserveAmount($payment);
    // Ooops, we added one zero more than necessary! Let's change that.
    $payment->setAmount(Money::EUR(120));
    $paymentProvider->updateReservedAmount($payment);
    // Yay, time to get richer!
    $paymentProvider->collectMoney($payment);
    // No, they demanded a refund immediately :(
    $paymentProvider->refundCollectedMoney($payment);
} catch (AmountCouldNotBeReserved $e) {
    // some error handling logic
} catch (ReservedAmountCouldNotBeUpdated $e) {
    // some error handling logic
} catch (MoneyCouldNotBeCollected $e) {
    // some error handling logic
} catch (MoneyCouldNotBeRefunded $e) {
    // some error handling logic
}
