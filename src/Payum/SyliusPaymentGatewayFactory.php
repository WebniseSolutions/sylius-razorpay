<?php

declare(strict_types=1);

namespace Srkits\SyliusRazorPayPlugin\Payum;

use Srkits\SyliusRazorPayPlugin\Payum\Action\StatusAction;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;

final class SyliusPaymentGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'sylius_payment',
            'payum.factory_title' => 'Razor Pay',
            'payum.action.status' => new StatusAction(),
        ]);

        $config['payum.api'] = function (ArrayObject $config) {
            return new SyliusApi($config['api_key'], $config['api_secret']);
        };
    }
}