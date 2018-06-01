<?php
declare(strict_types=1);

$order = new Order(new Payment(1200));

$paypalPaymentProvider = new PaypalPaymentProvider(new PaypalClient());
$paymentGateway = new PaymentGateway($paypalPaymentProvider);

$paymentGateway->reserveAmount($order);

// Ooops, we added one zero more than necessary! Let's change that.
$paymentGateway->updateReservedAmount($order, 120);

$paymentGateway->collectMoney($order);
