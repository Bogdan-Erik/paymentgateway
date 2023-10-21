<?php

namespace Bogdanerik\Paymentgateway\Core;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;

class MyPosGateway implements PaymentGateway {
    public function processPayment(Payment $data): string
    {
        $config = $data->getConfig();
        $purchase = new \Mypos\IPC\Purchase($config);
        $purchase->setUrlCancel($data->getCancelUrl());
        $purchase->setUrlOk($data->getOkUrl());
        $purchase->setUrlNotify($data->getNotifyUrl());
        $purchase->setOrderID($data->getOrderId());
        $purchase->setCurrency($data->getCurrency());
        $purchase->setCustomer($data->getBillingDatas());
        $purchase->setCart($data->getCart());

        $purchase->setCardTokenRequest(\Mypos\IPC\Purchase::CARD_TOKEN_REQUEST_NONE);
        $purchase->setPaymentParametersRequired(\Mypos\IPC\Purchase::PURCHASE_TYPE_SIMPLIFIED_PAYMENT_PAGE);

        try {
            $purchase->process();
        } catch (\Mypos\IPC\IPC_Exception $ex) {
            throw new \Exception($ex->getMessage());
        }

        return 'success';
    }
    public function refundPayment(string $transactionId, float $amount): string 
    {
        //TODO: Refound logic
        return 'todo';
    }
}
