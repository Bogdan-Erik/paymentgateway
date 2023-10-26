<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

interface PaymentGateway
{
    public function processPayment(Payment $data): string;
    public function refundPayment(string $transactionId, float $amount): string;
}
