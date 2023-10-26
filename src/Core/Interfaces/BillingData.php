<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

interface BillingData
{
    public function getFirstName():string;
    public function setFirstName(string $value):self;

    public function getLastName():string;
    public function setLastName(string $value):self;

    public function getEmail():string;
    public function setEmail(string $value):self;

    public function getTelephone():string;
    public function setTelephone(string $value):self;

    public function getCountry():string;
    public function setCountry(string $value):self;
    

    public function getAddress():string;
    public function setAddress(string $value):self;

    public function getCity():string;
    public function setCity(string $value):self;

    public function getZip():string;
    public function setZip(string $value):self;

}
