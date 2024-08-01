<?php
use PHPUnit\Framework\TestCase;
use AcmeWidget\Offer;

class OfferTest extends TestCase {
    public function testOfferCreation() {
        $offer = new Offer('R01', 'BOGO_HALF', 0.5);
        $this->assertEquals('R01', $offer->getProductCode());
        $this->assertEquals('BOGO_HALF', $offer->getDiscountType());
        $this->assertEquals(0.5, $offer->getDiscountValue());
    }
}
