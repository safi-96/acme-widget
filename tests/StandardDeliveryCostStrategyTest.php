<?php
use PHPUnit\Framework\TestCase;
use AcmeWidget\StandardDeliveryCostStrategy;

class StandardDeliveryCostStrategyTest extends TestCase {
    public function testCalculateDeliveryCost() {
        $deliveryRules = [
            'under50' => 4.95,
            'under90' => 2.95,
            'over90' => 0
        ];
        $strategy = new StandardDeliveryCostStrategy($deliveryRules);

        $this->assertEquals(4.95, $strategy->calculate(30.00));
        $this->assertEquals(2.95, $strategy->calculate(60.00));
        $this->assertEquals(0.00, $strategy->calculate(100.00));
    }
}
