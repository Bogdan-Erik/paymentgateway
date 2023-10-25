<?php

namespace Bogdanerik\Paymentgateway\Core\MyPos;

use Bogdanerik\Paymentgateway\Core\Interfaces\CartItem;
use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use Bogdanerik\Paymentgateway\Core\Interfaces\Payment as PaymentInterface;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentPurchase;

class MyPosPayment implements PaymentInterface, PaymentPurchase {
    public object|null $config = null;
    public object|null $cart = null;
    public object|null $billingDatas = null;

    public string $okUrl = "";
    public string $cancelUrl = "";
    public string $notifyUrl = "";
    public string $orderId = "";
    public string $currency = "";

    public function getBillingDatas():object {
        return $this->billingDatas;
    }

    public function getCart(): object|null {
        return $this->cart;
    }

    public function setCart(array $datas): static {
        $cart = new \Mypos\IPC\Cart;

        foreach ($datas as $item) {
            if (!$item instanceof CartItem) {
                throw new \Exception('Cart item element is not object of CartItem');   
            }

            $cart->add($item->getName(), $item->getQuantity(), $item->getPrice());
        }

        $this->cart = $cart;
        
        return $this;
    }

    public function setBillingDatas(BillingData $billingData): static {


        $customer = $this->config->customers->create([
            'description' => 'example customer',
            'email' => 'email@example.com',
            'payment_method' => 'pm_card_visa',
        ]);
        echo $customer;

        /*

        'line_items' => [
    [
      'price' => '{{PRICE_ID}}',
      'quantity' => 1,
    ],
  ],
  'mode' => 'payment',
  'shipping_address_collection' => ['allowed_countries' => ['US']],
  'custom_text' => [
    'shipping_address' => [
      'message' => 'Please note that we can\'t guarantee 2-day delivery for PO boxes at this time.',
    ],
    'submit' => ['message' => 'We\'ll email you instructions on how to get started.'],
  ],
  'success_url' => 'https://example.com/success',
  'cancel_url' => 'https://example.com/cancel',

  */
    
        $customer = new \Mypos\IPC\Customer();

        $customer->setFirstName($billingData->getFirstName());
        $customer->setLastName($billingData->getLastName());
        $customer->setEmail($billingData->getEmail());
        $customer->setPhone($billingData->getTelephone());
        $customer->setCountry($billingData->getCountry());
        $customer->setAddress($billingData->getAddress());
        $customer->setCity($billingData->getCity());
        $customer->setZip($billingData->getZip());

        $this->billingDatas = $customer;
        
        return $this;
    }

    public function getConfig(): object {
        return $this->config;
    }
    
    public function setConfig(array $data): self {
        $stripeConfig = new \Stripe\StripeClient($data['apiKey']);

        $this->config = $stripeConfig;
        
        return $this;
    }

    public function getOkUrl(): string {
        return $this->okUrl;
    }

    public function setOkUrl(string $data): self {
        $this->okUrl = $data;

        return $this;
    }

    public function getCancelUrl(): string {
        return $this->cancelUrl;
    }

    public function setCancelUrl(string $data): self {
        $this->cancelUrl = $data;

        return $this;
    }


    public function getNotifyUrl(): string {
        return $this->notifyUrl;
    }

    public function setNotifyUrl(string $data): self {
        $this->notifyUrl = $data;

        return $this;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function setCurrency(string $data): self {
        $this->currency = $data;

        return $this;
    }
    public function getOrderId(): string {
        return $this->orderId;
    }

    public function setOrderId(string $data): self {
        $this->orderId = $data;

        return $this;
    }

    

}