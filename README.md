# Acme Widget Co - Sales System Proof of Concept

## Description

This is a proof of concept for Acme Widget Co's new sales system. The system includes a product catalogue, delivery charge rules, and special offers.

## Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/acme-widget.git
   cd acme-widget

2. Install dependencies:
    composer install

3. Run PHPStan:
    vendor/bin/phpstan analyse

4. Run tests:
    vendor/bin/phpunit tests

5. Using Docker:
    docker-compose up

6. Usage
    Basket::add($productCode) - Adds a product to the basket.
    Basket::total() - Returns the total cost of the basket.
