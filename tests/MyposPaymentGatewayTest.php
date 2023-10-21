<?php declare(strict_types=1);

use Bogdanerik\Paymentgateway\Core\Objects\BillingData;
use Bogdanerik\Paymentgateway\Core\MyPos\MyPosPayment;
use Bogdanerik\Paymentgateway\Core\MyPosGateway;
use Bogdanerik\Paymentgateway\Core\Payment;
use PHPUnit\Framework\TestCase;
use Bogdanerik\Paymentgateway\Core\Objects\CartItem;

final class MyposPaymentGatewayTest extends TestCase
{
    public function testMyposPayment(): void
    {
        $myposGateway = new MyPosGateway();
        $myposPayment = new MyPosPayment();

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
        
        //Setting up the PaymentObject (cart, billingDatas, Config)
        $myposPayment
        ->setConfig([
            'ipcUrl' => 'hhttps://www.mypos.com/vmp/checkout-test',
            'lang' => 'hu',
            'version' => '1.4',
            'apiKey' => 'eyJzaWQiOiIwMDAwMDAwMDAwMDAwMTAiLCJjbiI6IjYxOTM4MTY2NjEwIiwicGsiOiItLS0tLUJFR0lOIFJTQSBQUklWQVRFIEtFWS0tLS0tXHJcbk1JSUNYQUlCQUFLQmdRQ2YwVGRjVHVwaGI3WCtad2VrdDFYS0VXWkRjelNHZWNmbzZ2UWZxdnJhZjVWUHpjbkpcclxuMk1jNUo3MkhCbTB1OThFSkhhbitubGUyV09aTVZHSXRUYVwvMmsxRlJXd2J0N2lRNWR6RGg1UEVlWkFTZzJVV2VcclxuaG9SOEw4TXBOQnFINmg3WklUd1ZUZlJTNExzQnZsRWZUN1B6aG01WUpLZk0rQ2R6RE0rTDlXVkVHd0lEQVFBQlxyXG5Bb0dBWWZLeHdVdEVicTh1bFZyRDNubldoRitoazFrNktlamRVcTBkTFlOMjl3OFdqYkNNS2I5SWFva21xV2lRXHJcbjVpWkdFcll4aDdHNEJEUDhBV1wvK005SFhNNG9xbTVTRWtheGhiVGxna3MrRTFzOWRUcGRGUXZMNzZUdm9kcVN5XHJcbmwyRTJCZ2hWZ0xMZ2tkaFJuOWJ1YUZ6WXRhOTVKS2ZneUtHb25OeHNRQTM5UHdFQ1FRREtiRzBLcDZLRWtOZ0Jcclxuc3JDcTNDeDJvZDVPZmlQREc4ZzNSWVpLeFwvTzlkTXk1Q00xNjBEd3VzVkpwdXl3YnBSaGNXcjNna3owUWdSTWRcclxuSVJWd3l4TmJBa0VBeWgzc2lwbWNnTjdTRDh4QkdcL010QllQcVdQMXZ4aFNWWVBmSnp1UFUzZ1M1TVJKelFIQnpcclxuc1ZDTGhUQlk3aEhTb3FpcWxxV1lhc2k4MUp6QkV3RXVRUUpCQUt3OXFHY1pqeU1IOEpVNVREU0dsbHIzanlieFxyXG5GRk1QajhUZ0pzMzQ2QUI4b3pxTExcL1RodldQcHhIdHRKYkg4UUFkTnV5V2RnNmRJZlZBYTk1aDdZK01DUUVaZ1xyXG5qUkRsMUJ6N2VXR08yYzBGcTlPVHozSVZMV3BubUd3ZlcrSHlheGl6eEZoVitGT2oxR1VWaXI5aHlsVjdWMERVXHJcblFqSWFqeXZcL29lRFdoRlE5d1FFQ1FDeWRoSjZOYU5RT0NaaCs2UVRySDNUQzVNZUJBMVllaXBvZTcrQmhzTE5yXHJcbmNGRzhzOXNUeFJubHRjWmwxZFhhQlNlbXZwTnZCaXpuMEt6aThHM1pBZ2M9XHJcbi0tLS0tRU5EIFJTQSBQUklWQVRFIEtFWS0tLS0tIiwicGMiOiItLS0tLUJFR0lOIENFUlRJRklDQVRFLS0tLS1cclxuTUlJQnNUQ0NBUm9DQ1FDQ1BqTnR0R05RV0RBTkJna3Foa2lHOXcwQkFRc0ZBREFkTVFzd0NRWURWUVFHRXdKQ1xyXG5SekVPTUF3R0ExVUVDZ3dGYlhsUVQxTXdIaGNOTVRneE1ERXlNRGN3T1RFeldoY05Namd4TURBNU1EY3dPVEV6XHJcbldqQWRNUXN3Q1FZRFZRUUdFd0pDUnpFT01Bd0dBMVVFQ2d3RmJYbFFUMU13Z1o4d0RRWUpLb1pJaHZjTkFRRUJcclxuQlFBRGdZMEFNSUdKQW9HQkFNTCtWVG1pWTR5Q2hvT1RNWlRYQUlHXC9tayt4ZlwvOW1qd0h4V3p4dEJKYk5uY05LXHJcbjBPTEkwVlhZS1cyR2dWa2xHSEhRanZldzFoVEZrRUdqbkNKN2Y1Q0RuYmd4ZXZ0eUFTREdzdDkyYTZ4Y0FlZEVcclxuYWRQMG5GWGhVeitjWVlJZ0ljZ2ZEY1gzWldlTkVGNWtzY3F5NTJrcEQyTzduRk5DVis4NXZTNGR1SkJOQWdNQlxyXG5BQUV3RFFZSktvWklodmNOQVFFTEJRQURnWUVBQ2oweGIrdE5ZRVJKa0wrcCt6RGNCc0JLNFJ2a25QbHBrK1lQXHJcbmVwaHVuRzJkQkdPbWdcL1dLZ29EMVBMV0QyYkVmR2dKeFlCSWc5cjF3TFlwREMxdHhoeFYrMk9CUVM4NktVTGgwXHJcbk5FY3IwcUVZMDVtSTRGbEUrRFwvQnBUXC8rV0Z5S2tadWc5MnJLMEZsejcxWHlcLzltQlhiUWZtK1lLNmw5cm9SWWRcclxuSjRzSGVRYz1cclxuLS0tLS1FTkQgQ0VSVElGSUNBVEUtLS0tLSIsImlkeCI6MX0'
        ])
        ->setOkUrl('https://beta.cleananddrive.hu/recurring-transaction/success')
        ->setCancelUrl('https://beta.cleananddrive.hu/recurring-transaction/cancel')
        ->setNotifyUrl('https://beta.cleananddrive.hu/recurring-transaction/notify')
            ->setOrderId(uniqid())
        ->setCart($cartDatas)
        ->setBillingDatas($billingDatas)
        ;

       
       $this->assertInstanceOf(MyPosPayment::class, $myposPayment);
    }

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