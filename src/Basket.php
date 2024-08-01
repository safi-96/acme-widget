<?php
namespace AcmeWidget;

class Basket {
    private array $products = [];
    private array $catalogue;
    private DeliveryCostStrategyInterface $deliveryCostStrategy;
    private array $offers;

    public function __construct(array $catalogue, DeliveryCostStrategyInterface $deliveryCostStrategy, array $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryCostStrategy = $deliveryCostStrategy;
        $this->offers = $offers;
    }

    public function add(string $productCode): void {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $this->catalogue[$productCode];
        }
    }

    public function total(): string {
        $total = 0;
        $productCounts = [];

        foreach ($this->products as $product) {
            $total += $product->getPrice();
            $productCode = $product->getCode();
            if (!isset($productCounts[$productCode])) {
                $productCounts[$productCode] = 0;
            }
            $productCounts[$productCode]++;
        }

        foreach ($this->offers as $offer) {
            if (isset($productCounts[$offer->getProductCode()])) {
                $count = $productCounts[$offer->getProductCode()];
                if ($offer->getDiscountType() === 'BOGO_HALF') {
                    $total -= floor($count / 2) * ($this->catalogue[$offer->getProductCode()]->getPrice() / 2);
                }
            }
        }

        $total += $this->deliveryCostStrategy->calculate($total);

        return number_format($total, 2);
    }
}
