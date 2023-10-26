<?php

namespace Bogdanerik\Paymentgateway\Core\MyPos;

use Bogdanerik\Paymentgateway\Core\Interfaces\CartItem;
use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use Bogdanerik\Paymentgateway\Core\Interfaces\Payment as PaymentInterface;
use Bogdanerik\Paymentgateway\Core\PaymentPurchase;
/**
 * This class implements the PaymentInterface and PaymentPurchase interfaces and provides methods to set and get payment-related data such as configuration, cart, billing data, URLs, currency, and order ID for MyPos payment gateway.
 * 
 * @implements PaymentInterface, PaymentPurchase
 */

final class MyPosPayment extends PaymentPurchase implements PaymentInterface
{
    public object|null $config = null;
    public object|null $cart = null;
    public object|null $billingDatas = null;

    public function getCart(): object|null
    {
        return $this->cart;
    }

    public function setCart(array $datas): static
    {
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

    public function getBillingDatas():object
    {
        return $this->billingDatas;
    }

    public function setBillingDatas(BillingData $billingData): static
    {
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

    public function getConfig(): object
    {
        return $this->config;
    }
    
    public function setConfig(array $data): self
    {
        $myposConfig = new \Mypos\IPC\Config();
        
        $myposConfig->setIpcURL($data['ipcUrl']);
        $myposConfig->setLang($data['lang']);
        $myposConfig->setVersion($data['version']);
        $configurationPackage = $data['apiKey'];
        $myposConfig->loadConfigurationPackage($configurationPackage);


        $this->config = $myposConfig;
        
        return $this;
    }
}
