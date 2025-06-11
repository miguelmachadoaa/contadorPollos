<?php
namespace App\Services;

class ApiService
{
    protected $baseUrl;
    protected $user;
    protected $pass;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = 'http://server10.globalwsystems.com:8212/integracion';
        $this->user ='integración';
        $this->pass ='987654321';
        $this->token = null;
        
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
                "Authorization: Bearer {$this->token}",
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

    public function authenticate(){

        $response =   $this->makeRequest('POST', '/authenticate', ['username'=>$this->user, 'password'=>$this->pass]);

       if(isset($response['body']['token'])){
        $this->token = $response['body']['token'];
       }
       
        return $response;
    }

    public function setOrder(array $data)
    {
        $this->authenticate();
        return $this->makeRequest('POST', '/setOrder', $data);
    }

    public function getDiscards()
    {
        $this->authenticate();
        return $this->makeRequest('GET', "/getDiscards");
    }

    public function getOrders()
    {
        $this->authenticate();
        return $this->makeRequest('GET', "/getOrders");
    }

    //crear llamadas para suscripciones

    public function closeDiscard(array $data)
    {
        $this->authenticate();
        return $this->makeRequest('POST', '/closeDiscard', $data);
    }

    public function closeticket(array $data)
    {
        $this->authenticate();
        return $this->makeRequest('GET', "/closeticket");
    }


    // Puedes agregar más métodos como crear suscripciones, etc.
}
