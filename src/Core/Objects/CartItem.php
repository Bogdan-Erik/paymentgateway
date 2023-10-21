<?php

namespace Bogdanerik\Paymentgateway\Core\Objects;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;
use Bogdanerik\Paymentgateway\Core\Interfaces\BillingData as BillingDataInterface;
use Bogdanerik\Paymentgateway\Core\Interfaces\CartItem as CartItemInterface;
final class CartItem implements  CartItemInterface{
    private string $name;
    private float $price;
    private float $vat;
    private int $quantity;

    /**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrice(): float {
		return $this->price;
	}
	
	/**
	 * @param float $price 
	 * @return self
	 */
	public function setPrice(float $price): self {
		$this->price = $price;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getVat(): float {
		return $this->vat;
	}
	
	/**
	 * @param float $vat 
	 * @return self
	 */
	public function setVat(float $vat): self {
		$this->vat = $vat;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getQuantity(): int {
		return $this->quantity;
	}
	
	/**
	 * @param int $quantity 
	 * @return self
	 */
	public function setQuantity(int $quantity): self {
		$this->quantity = $quantity;
		return $this;
	}


}
