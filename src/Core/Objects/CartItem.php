<?php

namespace Bogdanerik\Paymentgateway\Core\Objects;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;
use Bogdanerik\Paymentgateway\Core\Interfaces\BillingData as BillingDataInterface;
use Bogdanerik\Paymentgateway\Core\Interfaces\CartItem as CartItemInterface;

/**
 * Class CartItem
 * Represents an item in a shopping cart
 *
 * @package Bogdanerik\Paymentgateway\Core\Objects
 */
final class CartItem implements  CartItemInterface
{
    private string $name;
    private float $price;
    private float $vat;
    private int $quantity;

    /**
     * @return string
     * Returns the name of the cart item
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param  string $name 
     * @return self
     * Sets the name of the cart item
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     * Returns the price of the cart item
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     * @param  float $price 
     * @return self
     * Sets the price of the cart item
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     * Returns the VAT of the cart item
     */
    public function getVat(): float
    {
        return $this->vat;
    }
    
    /**
     * @param  float $vat 
     * @return self
     * Sets the VAT of the cart item
     */
    public function setVat(float $vat): self
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return int
     * Returns the quantity of the cart item
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    /**
     * @param  int $quantity 
     * @return self
     * Sets the quantity of the cart item
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }


}
