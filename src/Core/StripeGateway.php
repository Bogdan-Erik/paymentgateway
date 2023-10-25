<?php

namespace Bogdanerik\Paymentgateway\Core;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;

class StripeGateway implements PaymentGateway {
    public function processPayment(Payment $data): string
    {
        return 'success';
    }
    public function refundPayment(string $transactionId, float $amount): string 
    {
        //TODO: Refound logic
        return 'todo';
    }
}
