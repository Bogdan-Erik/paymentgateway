<?php

namespace Bogdanerik\Paymentgateway\Core\Interfaces;

interface CartItem
{
    public function getName():string;
    public function setName(string $value):self;
    public function getPrice():float;
    public function setPrice(float $value):self;
    public function getVat():float;
    public function setVat(float $value):self;
    public function getQuantity():int;
    public function setQuantity(int $value):self;
}
