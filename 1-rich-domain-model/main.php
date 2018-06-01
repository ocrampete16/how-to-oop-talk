<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use PaymentExample\Client\PaypalClient;
use PaymentExample\Order;
use PaymentExample\DuePayment;
use PaymentExample\PaymentProvider\PaypalPaymentProvider;

$order = Order::withDuePayment(new DuePayment(1200));
$paymentProvider = new PaypalPaymentProvider(new PaypalClient());

// We just received an order! Let's reserve the amount for now.
$paymentProvider->reserveAmount($order);
// Ooops, we added one zero more than necessary! Let's change that.
$paymentProvider->updateReservedAmount($order, 120);
// Yay, time to get richer!
$paymentProvider->collectMoney($order);
// No, they demanded a refund immediately :(
$paymentProvider->refundCollectedMoney($order);


//TIPP: Grundinterface für alle paketspezifischen Exceptions, erben von SPL-Exceptions je nach Bedarf
