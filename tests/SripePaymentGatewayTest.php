<?php declare(strict_types=1);

use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use Bogdanerik\Paymentgateway\Core\Stripe\StripePayment;
use PHPUnit\Framework\TestCase;
use Bogdanerik\Paymentgateway\Core\Objects\CartItem;

final class SripePaymentGatewayTest extends TestCase
{
    public function testStripePayment(): void
    {
        $stripePayment = new StripePayment();

        $billingDatas = new BillingData();
        $billingDatas
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setEmail('johndoe@test.com')
            ->setTelephone('+36201234567')
            ->setCountry('HU')
            ->setAddress('Test street 23')
            ->setCity('Budapest')
            ->setZip('1234')
        ;

        $cartDatas = [];
        $cartDatas[] = (new CartItem())
            ->setName('Test product')
            ->setPrice(990)
            ->setQuantity(1)
            ->setVat(27); 
        
            $cartDatas[] = (new CartItem())
            ->setName('Test product 2')
            ->setPrice(8990)
            ->setQuantity(2)
            ->setVat(27); 

        $stripePayment
        ->setConfig([
            'apiKey' => 'sk_test_4eC39HqLyjWDarjtT1zdp7dc'
        ])
        ->setBillingDatas($billingDatas);

       
       $this->assertInstanceOf(StripePayment::class, $stripePayment);
    }
}