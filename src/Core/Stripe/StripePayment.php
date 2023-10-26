<?php

namespace Bogdanerik\Paymentgateway\Core\Stripe;

use Bogdanerik\Paymentgateway\Core\Interfaces\CartItem;
use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use Bogdanerik\Paymentgateway\Core\Interfaces\Payment as PaymentInterface;
use Bogdanerik\Paymentgateway\Core\PaymentPurchase;

/**
 * StripePayment class implements PaymentInterface and PaymentPurchase interfaces.
 * It provides methods to set and get configuration, cart, billing data, URLs, currency and order ID for Stripe payment.
 * 
 * @package PaymentGateway\Core\Stripe
 */

final class StripePayment extends PaymentPurchase implements PaymentInterface
{
    public object|null $config = null;
    public object|array|null $cart = null;
    public object|array|null $billingDatas = null;


    public function getCart(): object|null
    {
        return $this->cart;
    }

    public function setCart(array $datas): static
    {
        $cart = [];

        foreach ($datas as $item) {
            $cart[] = [
                'quantity' => $item->getQuantity(),
                'price_data' => [
                    'currency' => $this->getCurrency(),
                    'unit_amount' => $item->getPrice(),
                    'product_data' => [
                        'name' => $item->getName()
                    ],
                ],
            ];
        }

        $this->cart = $cart;

        return $this;
    }

    public function getBillingDatas(): array
    {
        return $this->billingDatas;
    }

    public function setBillingDatas(BillingData $billingData): static
    {

        $this->billingDatas = [
            'email' => $billingData->getEmail(),
            'name' => $billingData->getFullName(),
            'phone' => $billingData->getTelephone(),
            'address' => [
                'country' => $billingData->getCountry(),
                'city' => $billingData->getCity(),
                'postal_code' => $billingData->getZip(),
                'line1' => $billingData->getAddress(),
            ],
        ];

        return $this;
    }

    public function getConfig(): object
    {
        return $this->config;
    }

    public function setConfig(array $data): self
    {
        $stripeConfig = new \Stripe\StripeClient($data['apiKey']);

        $this->config = $stripeConfig;

        return $this;
    }
}
