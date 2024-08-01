<?php
use PHPUnit\Framework\TestCase;
use AcmeWidget\Product;

class ProductTest extends TestCase {
    public function testProductCreation() {
        $product = new Product('R01', 32.95);
        $this->assertEquals('R01', $product->getCode());
        $this->assertEquals(32.95, $product->getPrice());
    }
}
