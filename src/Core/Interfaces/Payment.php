<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

use Bogdanerik\Paymentgateway\Core\Objects\BillingData;

interface Payment extends PaymentPurchase {
    public function getConfig():object;
    public function setConfig(array $data):self;
    
    public function getCart():object|array|null;
    public function setCart(array $datas):self;

    public function getBillingDatas(): object | array;
    public function setBillingDatas(BillingData $billingData):self;

    
}