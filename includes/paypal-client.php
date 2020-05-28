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
        $clientId = "AeY8n5XlOGvfR8jPLj6rPKwq1R2qkCdMoLmNoYQUkiAMp-UTOPsMoEYZhF7EH1hwDOwD4mIFWnPQslF9";
        $clientSecret = "ECRnz_S8oy6ubrTTqxPXBEhIbM-9HpSFoNN8EoaMogtKnUklKeG8icSoWHxSCtj6NryDnSmSCcb9lnE3";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}

?>