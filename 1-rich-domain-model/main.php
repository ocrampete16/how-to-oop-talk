<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Money\Money;
use PaymentExample\Client\PaypalClient;
use PaymentExample\Payment;
use PaymentExample\PaymentProvider\PaypalPaymentProvider;

$payment = Payment::withAmount(Money::EUR(1200));
$paymentProvider = new PaypalPaymentProvider(new PaypalClient());

// We just received an order! Let's reserve the amount for now.
$paymentProvider->reserveAmount($payment);

// Ooops, we added one zero more than necessary! Let's change that.
$paymentProvider->updateReservedAmount($payment, Money::EUR(120));

// Yay, time to get richer!
$paymentProvider->collectMoney($payment);

// No, they demanded a refund immediately :(
$paymentProvider->refundCollectedMoney($payment);
