<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

use Bogdanerik\Paymentgateway\Core\Objects\BillingData;

interface PaymentPurchase {
    public function getOkUrl(): string;
    public function setOkUrl(string $data):self;
    public function getCancelUrl(): string;
    public function setCancelUrl(string $data):self;

    public function getNotifyUrl(): string;
    public function setNotifyUrl(string $data):self;

    public function getOrderId(): string;
    public function setOrderId(string $data):self;

    public function getCurrency(): string;
    public function setCurrency(string $data):self;
    
}