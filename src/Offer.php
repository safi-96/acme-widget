<?php
namespace AcmeWidget;

class Offer {
    private string $productCode;
    private string $discountType;
    private float $discountValue;

    public function __construct(string $productCode, string $discountType, float $discountValue) {
        $this->productCode = $productCode;
        $this->discountType = $discountType;
        $this->discountValue = $discountValue;
    }

    public function getProductCode(): string {
        return $this->productCode;
    }

    public function getDiscountType(): string {
        return $this->discountType;
    }

    public function getDiscountValue(): float {
        return $this->discountValue;
    }
}
