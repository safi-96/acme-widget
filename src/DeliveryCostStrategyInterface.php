<?php
namespace AcmeWidget;

interface DeliveryCostStrategyInterface {
    public function calculate(float $total): float;
}
