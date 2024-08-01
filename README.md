# Acme Widget Co - Sales System Proof of Concept

## Description

This is a proof of concept for Acme Widget Co's new sales system. The system includes a product catalogue, delivery charge rules, and special offers.

## Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/acme-widget.git
   cd acme-widget

## Prerequisites
- PHP 7.4 or higher
- Composer
- Docker (optional)
- Git

2. Install dependencies:
    ```composer install``

3. Run PHPStan:
    ```vendor/bin/phpstan analyse```

4. Run tests:
    ```vendor/bin/phpunit tests```

5. Using Docker:
    ```docker-compose up```

6. Usage
    ```
        Basket::add($productCode) - Adds a product to the basket.
        Basket::total() - Returns the total cost of the basket.
    ```

## Example

    ```
        <?php
        use AcmeWidget\Basket;
        use AcmeWidget\Product;
        use AcmeWidget\Offer;
        use AcmeWidget\StandardDeliveryCostStrategy;

        $catalogue = [
            'R01' => new Product('R01', 32.95),
            'G01' => new Product('G01', 24.95),
            'B01' => new Product('B01', 7.95)
        ];

        $deliveryRules = [
            'under50' => 4.95,
            'under90' => 2.95,
            'over90' => 0
        ];

        $offers = [
            new Offer('R01', 'BOGO_HALF', 0.5)
        ];

        $deliveryCostStrategy = new StandardDeliveryCostStrategy($deliveryRules);
        $basket = new Basket($catalogue, $deliveryCostStrategy, $offers);

        $basket->add('R01');
        $basket->add('R01');
        echo $basket->total(); // Outputs: 54.37
        ?>
    ```