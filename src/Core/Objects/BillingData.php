<?php

namespace Bogdanerik\Paymentgateway\Core\Objects;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;
use Bogdanerik\Paymentgateway\Core\Interfaces\BillingData as BillingDataInterface;

final class BillingData implements BillingDataInterface {
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $telephone;
    private string $country;
    private string $address;
    private string $city;
    private string $zip;

	/**
	 * @return string
	 */
	public function getFirstName(): string {
		return $this->firstName;
	}
	
	/**
	 * @param string $firstName 
	 * @return self
	 */
	public function setFirstName(string $firstName): self {
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastName(): string {
		return $this->lastName;
	}
	
	/**
	 * @param string $lastName 
	 * @return self
	 */
	public function setLastName(string $lastName): self {
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTelephone(): string {
		return $this->telephone;
	}
	
	/**
	 * @param string $telephone 
	 * @return self
	 */
	public function setTelephone(string $telephone): self {
		$this->telephone = $telephone;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCountry(): string {
		return $this->country;
	}
	
	/**
	 * @param string $country 
	 * @return self
	 */
	public function setCountry(string $country): self {
		$this->country = $country;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAddress(): string {
		return $this->address;
	}
	
	/**
	 * @param string $address 
	 * @return self
	 */
	public function setAddress(string $address): self {
		$this->address = $address;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCity(): string {
		return $this->city;
	}
	
	/**
	 * @param string $city 
	 * @return self
	 */
	public function setCity(string $city): self {
		$this->city = $city;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getZip(): string {
		return $this->zip;
	}
	
	/**
	 * @param string $zip 
	 * @return self
	 */
	public function setZip(string $zip): self {
		$this->zip = $zip;
		return $this;
	}
}
