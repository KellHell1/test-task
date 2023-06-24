<?php declare(strict_types=1);

use App\Controller\ShippingController;
use App\Service\ShippingCostCalculator;
use PHPUnit\Framework\TestCase;

final class ShippingControllerTest extends TestCase
{
    public function testCalculateShippingCostWithValidCarrierSlugTransCompany(): void
    {
        $weight = 15;
        $carrierSlug = 'trans-company';

        $shippingController = new ShippingController(new ShippingCostCalculator());
        $response = $shippingController->calculateShippingCost($weight, $carrierSlug);

        $this->assertEquals('100 EUR', $response->getContent());
    }

    public function testCalculateShippingCostWithValidCarrierSlugPackGroupCompany(): void
    {
        $weight = 15;
        $carrierSlug = 'pack-group';

        $shippingController = new ShippingController(new ShippingCostCalculator());
        $response = $shippingController->calculateShippingCost($weight, $carrierSlug);

        $this->assertEquals('15 EUR', $response->getContent());
    }

    public function testCalculateShippingCostWithInvalidCarrierSlug(): void
    {
        $weight = 15;
        $carrierSlug = 'invalid-carrier';

        $shippingController = new ShippingController(new ShippingCostCalculator());
        $response = $shippingController->calculateShippingCost($weight, $carrierSlug);

        $this->assertEquals('Carrier not found', $response->getContent());
    }
}