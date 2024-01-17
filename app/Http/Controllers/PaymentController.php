<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsGetRequest;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsPatchRequest;
use PayPal\Core\SandboxEnvironment as sandboxEnvironment;
use PayPalHttp\HttpClient as PayPalHttpClient;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function getToken(){
        $clientId = 'AbcnnWQtVrCiRIWjtacYPDnw-paqRTZrqeyWyx1qQ7CyTdkHV-p-E8_1a8amGN4oTd7_yjbbTRrtkU8C';
    $clientSecret = 'EAowkKtQMV4gpN_1fLNtXbrWfd0Wu-hkNkrzP5znIYjdQ1Cnnk1WG2RrT0Musis9u4_7X4k-FQk3UoX1';

$accessTokenResponse = shell_exec("curl -v -X POST https://api-m.sandbox.paypal.com/v1/oauth2/token \
-H 'Accept: application/json' \
-H 'Accept-Language: en_US' \
-u '$clientId:$clientSecret' \
-d 'grant_type=client_credentials'");

$accessTokenData = json_decode($accessTokenResponse, true);
$expiresIn = $accessTokenData['expires_in'];
$expirationTime = time() + $expiresIn;
if (isset($accessTokenData['access_token'])) {
$accessToken = $accessTokenData['access_token'];
    return $accessToken;
} else {
// Handle the case where access token retrieval failed.
}
    }

    public function createPlan()
    {
        $accessToken = $this->getToken();
    //     dd($accessToken);
    //     $response = Http::withToken($accessToken)
    //     ->get('https://api-m.paypal.com/v1/some-protected-endpoint');

    // if ($response->successful()) {
    //     // Access token is valid
    //     dd('true') ;
    // } else {
    //     // Access token is invalid or expired
    //     dd('false');
    // }

        if ($accessToken === null) {
            return response()->json(['error' => 'Unable to get access token']);
        }
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'PayPal-Request-Id' => 'PLAN-18062019-001',
                'Prefer' => 'return=representation',
            ])
            ->post('https://api-m.paypal.com/v1/billing/plans', [
                'product_id' => 'PROD-XXCD1234QWER65782',
                'name' => 'Video Streaming Service Plan',
                'description' => 'Video Streaming Service basic plan',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => 'MONTH',
                            'interval_count' => 1,
                        ],
                        'tenure_type' => 'TRIAL',
                        'sequence' => 1,
                        'total_cycles' => 1,
                    ],
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => true,
                    'setup_fee' => [
                        'currency_code' => 'USD',
                        'value' => '10.00',
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => 3,

                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ]);
            return $response;
        // dd($response->json());
    }



}
