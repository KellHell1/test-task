<?php

namespace App\Entity;

use App\Model\Carrier;

class PackGroup extends Carrier {
    public function calculateShippingCost($weight) {
        return $weight;
    }
}