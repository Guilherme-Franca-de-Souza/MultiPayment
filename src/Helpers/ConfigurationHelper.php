<?php

namespace Potelo\MultiPayment\Helpers;

use Illuminate\Support\Facades\Config;
use Potelo\MultiPayment\Contracts\Gateway;
use Potelo\MultiPayment\Exceptions\ConfigurationException;

class ConfigurationHelper
{
    /**
     * @param  string|Gateway|null  $gateway
     *
     * @return Gateway
     * @throws ConfigurationException
     */
    public static function resolveGateway($gateway): Gateway
    {
        if (is_null($gateway)) {
            $gateway = Config::get('multi-payment.default');
        }
        if (is_string($gateway)) {
            if (empty(Config::get('multi-payment.gateways.'.$gateway))) {
                throw ConfigurationException::GatewayNotConfigured($gateway);
            }
            $className = Config::get("multi-payment.gateways.$gateway.class");
            if (!class_exists($className)) {
                throw ConfigurationException::GatewayNotFound($className);
            }
            $gateway = new $className;
        }
        if (!$gateway instanceof Gateway) {
            throw ConfigurationException::GatewayInvalidInterface(get_class($gateway));
        }
        return $gateway;
    }

    /**
     * @param  Gateway  $actualGateway
     *
     * @return Gateway|null
     */
    public static function getNextGateway(Gateway $actualGateway)
    {
        $gateways = Config::get('multi-payment.gateways');
        $found = false;
        foreach ($gateways as $key => $gateway) {
            if ($found == true) {
                return self::resolveGateway($key);
            } elseif ($gateway['class'] === get_class($actualGateway)) {
                $found = true;
            }
        }
        return null;
    }
}