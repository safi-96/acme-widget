<?php
namespace AcmeWidget;

class StandardDeliveryCostStrategy implements DeliveryCostStrategyInterface {
    private array $deliveryRules;

    public function __construct(array $deliveryRules) {
        $this->deliveryRules = $deliveryRules;
    }

    public function calculate(float $total): float {
        if ($total < 50) {
            return $this->deliveryRules['under50'];
        } elseif ($total < 90) {
            return $this->deliveryRules['under90'];
        }
        return 0;
    }
}
