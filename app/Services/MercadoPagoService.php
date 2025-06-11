<?php
namespace App\Services;
use App\Models\MercadoPagoSetting;

class MercadoPagoService
{
    protected $baseUrl;
    protected $accessToken;

    public function __construct()
    {
        $config = MercadoPagoSetting::first();
        $this->baseUrl = 'https://api.mercadopago.com';
        #$this->accessToken = env('MP_ACCESS_TOKEN');
        if($config && $config->sandbox_mode) {
            $this->accessToken = $config->access_token_test;
        } else {
            $this->accessToken = $config ? $config->access_token : '';
        }
    }

    private function makeRequest($method, $endpoint, $data = null)
    {
        $url = "{$this->baseUrl}{$endpoint}";

        $curl = curl_init();

       

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$this->accessToken}",
                "Content-Type: application/json"
            ],
        ]);

        if (!is_null($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception("Curl error: $error");
        }

        curl_close($curl);

        return [
            'status' => $httpCode,
            'body' => json_decode($response, true)
        ];
    }

    public function createPlan(array $data)
    {
        return $this->makeRequest('POST', '/preapproval_plan', $data);
    }

    public function deletePlan(string $planId)
    {
        return $this->makeRequest('DELETE', "/preapproval_plan/{$planId}");
    }

    public function getPlan(string $planId)
    {
        return $this->makeRequest('GET', "/preapproval_plan/{$planId}");
    }

    //crear llamadas para suscripciones

    public function createSubscription(array $data)
    {
        return $this->makeRequest('POST', '/preapproval', $data);
    }

    public function getSubscription(string $subscriptionId)
    {
        return $this->makeRequest('GET', "/preapproval/{$subscriptionId}");
    }

    public function cancelSubscription(string $subscriptionId)
    {
        return $this->makeRequest('PUT', "/preapproval/{$subscriptionId}", [
            'status' => 'cancelled'
        ]);
    }

    public function getPayment(string $paymentId)
    {
        return $this->makeRequest('GET', "/v1/payments/{$paymentId}");
    }

    public function createPreference(array $data)
    {
        return $this->makeRequest('POST', '/checkout/preferences', $data);
    }
    

    // Puedes agregar más métodos como crear suscripciones, etc.
}
