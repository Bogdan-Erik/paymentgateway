<?php declare(strict_types=1);

use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use PHPUnit\Framework\TestCase;

final class BillingDataTest extends TestCase
{
    public function testBillingDataObjectProps(): void
    {
        $this->assertObjectHasProperty('firstName', new BillingData);
        $this->assertObjectHasProperty('lastName', new BillingData);
        $this->assertObjectHasProperty('email', new BillingData);
        $this->assertObjectHasProperty('telephone', new BillingData);
        $this->assertObjectHasProperty('country', new BillingData);
        $this->assertObjectHasProperty('city', new BillingData);
        $this->assertObjectHasProperty('zip', new BillingData);
    }

    public function testBillingDataObjectValues(): void
    {
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
        $this->assertSame('John', $billingDatas->getFirstName(),);
        $this->assertSame('Doe', $billingDatas->getLastName());
        $this->assertSame('johndoe@test.com', $billingDatas->getEmail());

    }
}