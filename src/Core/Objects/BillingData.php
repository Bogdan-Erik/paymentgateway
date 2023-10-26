<?php

namespace Bogdanerik\Paymentgateway\Core\Objects;

use Bogdanerik\Paymentgateway\Core\Interfaces\Payment;
use Bogdanerik\Paymentgateway\Core\Interfaces\PaymentGateway;
use Bogdanerik\Paymentgateway\Core\Interfaces\BillingData as BillingDataInterface;

/**
 * Class BillingData
 *
 * @package Bogdanerik\Paymentgateway\Core\Objects
 *
 * Represents billing data for a payment transaction.
 */
final class BillingData implements BillingDataInterface
{
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
     *
     * Returns the first name of the billing data.
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param  string $firstName 
     * @return self
     *
     * Sets the first name of the billing data and returns the object.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the last name of the billing data.
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    /**
     * @param  string $lastName 
     * @return self
     *
     * Sets the last name of the billing data and returns the object.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the email of the billing data.
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param  string $email 
     * @return self
     *
     * Sets the email of the billing data and returns the object.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the telephone number of the billing data.
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    
    /**
     * @param  string $telephone 
     * @return self
     *
     * Sets the telephone number of the billing data and returns the object.
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the country of the billing data.
     */
    public function getCountry(): string
    {
        return $this->country;
    }
    
    /**
     * @param  string $country 
     * @return self
     *
     * Sets the country of the billing data and returns the object.
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the address of the billing data.
     */
    public function getAddress(): string
    {
        return $this->address;
    }
    
    /**
     * @param  string $address 
     * @return self
     *
     * Sets the address of the billing data and returns the object.
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the city of the billing data.
     */
    public function getCity(): string
    {
        return $this->city;
    }
    
    /**
     * @param  string $city 
     * @return self
     *
     * Sets the city of the billing data and returns the object.
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the zip code of the billing data.
     */
    public function getZip(): string
    {
        return $this->zip;
    }
    
    /**
     * @param  string $zip 
     * @return self
     *
     * Sets the zip code of the billing data and returns the object.
     */
    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     *
     * Returns the full name of the billing data.
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
