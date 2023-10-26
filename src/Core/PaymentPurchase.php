<?php

namespace Bogdanerik\Paymentgateway\Core;

use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentPurchase as PaymentPurchaseInterface;

class PaymentPurchase implements PaymentPurchaseInterface
{
    public string $okUrl = "";
    public string $cancelUrl = "";
    public string $notifyUrl = "";
    public string $orderId = "";
    public string $currency = "";


    public function getOkUrl(): string
    {
        return $this->okUrl;
    }

    public function setOkUrl(string $data): self
    {
        $this->okUrl = $data;

        return $this;
    }

    public function getCancelUrl(): string
    {
        return $this->cancelUrl;
    }

    public function setCancelUrl(string $data): self
    {
        $this->cancelUrl = $data;

        return $this;
    }


    public function getNotifyUrl(): string
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(string $data): self
    {
        $this->notifyUrl = $data;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $data): self
    {
        $this->currency = $data;

        return $this;
    }
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $data): self
    {
        $this->orderId = $data;

        return $this;
    }

    

}
