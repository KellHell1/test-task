<?php

namespace App\Model;

abstract class Carrier {
    abstract public function calculateShippingCost($weight);
}