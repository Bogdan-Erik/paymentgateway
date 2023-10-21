<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

interface PaymentType 
{
    public function getName(): string;
    public function getOkUrl(): string;
    public function getCancelUrl(): string;
    public function getNotifyUrl(): string;

}