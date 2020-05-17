<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = "AdPL6ygaOlizOZ-hT-a-RSvWcYacqaInboNkkG4sjBMTKU4FcldJZ7KlSO7L4pPlH8s6AOdzQd33stCd";
        $clientSecret = "ECux3BWv3ulOnRoHlJZRm66ZoceJTG41gxFIN5PvoV7UJ7I4r9RCC4cPl2Z1hfLOgKpz46_3dvIkg6cQ";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}

?>