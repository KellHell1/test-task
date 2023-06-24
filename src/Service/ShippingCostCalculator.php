<?php

namespace App\Service;

class ShippingCostCalculator {
    public function calculateCost($carrier, $weight) {
        return $carrier->calculateShippingCost($weight);
    }
}