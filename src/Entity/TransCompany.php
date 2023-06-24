<?php

namespace App\Entity;

use App\Model\Carrier;

class TransCompany extends Carrier {
    public function calculateShippingCost($weight): int
    {
        if ($weight <= 10) {
            return 20;
        } else {
            return 100;
        }
    }
}