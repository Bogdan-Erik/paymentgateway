<?php

namespace Bogdanerik\Paymentgateway\Core;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;

class StripeGateway implements PaymentGateway
{
    public function processPayment(Payment $data): string
    {
        $config = $data->getConfig();
        $config->checkout->sessions->create(
            [
            'success_url' => $data->getOkUrl(),
            'cancel_url' => $data->getCancelUrl(),
            'line_items' => $data->getCart(),
            'customer_details' => get_object_vars($data->getBillingDatas()),
            'mode' => 'payment',
            ]
        );

        return 'success';
    }
    public function refundPayment(string $transactionId, float $amount): string 
    {
        //TODO: Refound logic
        return 'todo';
    }
}
