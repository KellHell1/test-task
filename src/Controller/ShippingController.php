<?php

namespace App\Controller;

use App\Entity\PackGroup;
use App\Entity\TransCompany;
use App\Service\ShippingCostCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShippingController extends AbstractController
{
    private ShippingCostCalculator $shippingCostCalculator;

    public function __construct(ShippingCostCalculator $shippingCostCalculator)
    {
        $this->shippingCostCalculator = $shippingCostCalculator;
    }

    #[Route(path: "/calculate-shipping-cost/{weight}/{carrierSlug}", methods: ['GET'])]
    public function calculateShippingCost(int $weight, string $carrierSlug): Response
    {
        $carrier = $this->getCarrierBySlug($carrierSlug);

        if (!$carrier) {
            return new Response('Carrier not found', Response::HTTP_NOT_FOUND);
        }

        $cost = $this->shippingCostCalculator->calculateCost($carrier, $weight);

        return new Response(
            $cost.' EUR'
        );
    }

    private function getCarrierBySlug(string $carrierSlug): TransCompany|PackGroup|null
    {
        if ($carrierSlug === 'trans-company') {
            return new TransCompany();
        } elseif ($carrierSlug === 'pack-group') {
            return new PackGroup();
        }

        return null;
    }
}