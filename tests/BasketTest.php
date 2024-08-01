<?php
use PHPUnit\Framework\TestCase;
use AcmeWidget\{Basket, Product, Offer, StandardDeliveryCostStrategy};

class BasketTest extends TestCase {
    private array $catalogue;
    private array $deliveryRules;
    private array $offers;

    protected function setUp(): void {
        $this->catalogue = [
            'R01' => new Product('R01', 32.95),
            'G01' => new Product('G01', 24.95),
            'B01' => new Product('B01', 7.95)
        ];

        $this->deliveryRules = [
            'under50' => 4.95,
            'under90' => 2.95,
            'over90' => 0
        ];

        $this->offers = [
            new Offer('R01', 'BOGO_HALF', 0.5)
        ];
    }

    public function testBasketTotal() {
        $deliveryCostStrategy = new StandardDeliveryCostStrategy($this->deliveryRules);
        $basket = new Basket($this->catalogue, $deliveryCostStrategy, $this->offers);

        $basket->add('B01');
        $basket->add('G01');
        $this->assertEquals('37.85', $basket->total());

        $basket = new Basket($this->catalogue, $deliveryCostStrategy, $this->offers);
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals('54.38', $basket->total());

        $basket = new Basket($this->catalogue, $deliveryCostStrategy, $this->offers);
        $basket->add('R01');
        $basket->add('G01');
        $this->assertEquals('60.85', $basket->total());

        $basket = new Basket($this->catalogue, $deliveryCostStrategy, $this->offers);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals('98.28', $basket->total());
    }
}
