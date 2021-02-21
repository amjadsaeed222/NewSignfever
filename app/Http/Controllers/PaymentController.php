<?php

namespace App\Http\Controllers;

use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;

class PaymentController extends Controller
{
    //
    public function execute()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AeSEK2YuXhQsR4uwz4T7t8I41_8_kPKwzy9aTRwMIzXZ_G152y03aOqemxZFlp2222XlN3or8iArM-7Q',     // ClientID
                'ELqFyc5ywPaNJyAwzu6B9V1PHl8P3snsgFp5PSFP78Ktl0CM48s2O5I8jjIbxuOsWlx7s0UaHI01__Pi'      // ClientSecret
            )
    );
        return request ('paymentId');
    }
}
