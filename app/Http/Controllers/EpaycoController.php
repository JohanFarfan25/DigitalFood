<?php

namespace App\Http\Controllers;

use Epayco\Epayco;
use GuzzleHttp\Client;

class EpaycoController extends Controller
{
    private $token;
    private $client;

    const API_LOGUIN = 'https://apify.epayco.co/login';
    const API_PAY = 'https://apify.epayco.co/payment/process';

    public function __construct()
    {
        $this->client = new Client();
        $apiKey = env('PUBLIC_API_KEY_EPAYCO');
        $privateKey = env('PRIVATE_API_KEY_EPAYCO');

        $authorization = base64_encode("$apiKey:$privateKey");

        $res = $this->client->post(SELF::API_LOGUIN, [
            'headers' => [
                'accept' => 'text/plain',
                'Authorization' => 'Basic ' . $authorization
            ],
        ]);

        $res = json_decode($res->getBody());
        $this->token = $res->token;
    }


    public function payment($card, $dataPayer, $transaction, $description, $customer, $ip)
    {

        $body = [
            'value' => strval($transaction->price ?? ''),
            'currency' => strval('COP'),
            'docType' => strval($dataPayer['documentType']),
            'docNumber' => strval($dataPayer['documentNumber']),
            'name' => strval($dataPayer['name']),
            'lastName' => strval($dataPayer['lastName']),
            'email' => strval($dataPayer['email']),
            'cellPhone' => strval($dataPayer['phone']),
            'phone' => strval($dataPayer['phone']),
            'cardNumber' => $card['number'],
            'cardExpYear' => $card['exp_year'],
            'cardExpMonth' => $card['exp_month'],
            'cardCvc' => $card['cvc'],
            'dues' => strval(1),
            // 'urlConfirmation' => $urlConfirmation,
            // 'methodConfirmation' => 'POST',
            'testMode' => true,
            'description' => $description,
            'ip' => $ip,
        ];

        $res = $this->client->post(SELF::API_PAY, [
            'body' => json_encode($body),
            'headers' => [
                'Authorization' =>  'Bearer ' . $this->token,
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($res->getBody());
    }
}
