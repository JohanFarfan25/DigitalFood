<?php

namespace App\Http\Controllers;

use Epayco\Epayco;

class EpaycoController extends Controller
{
    private $epayco;

    public function __construct()
    {
        $this->epayco = new Epayco(array(
            "apiKey" => "EPAYCO_PUBLIC_API_KEY",
            "privateKey" => "EPAYCO_PRIVATE_API_KEY",
            "lenguage" => "ES",
            "test" => true
        ));
    }
    /**
     * Display a listing of the resource.
     */
    public function createCustomer($dataPayer)
    {
        return $this->epayco->customer->create(array(
            "token_card" => $this->epayco->id,
            "name" => $dataPayer['name'],
            "last_name" => $dataPayer['lastName'],
            "email" => $dataPayer['email'],
            "default" => true,
            "city" => "Bogota",
            "address" => $dataPayer['address'],
            "phone" => $dataPayer['phone'],
            "cell_phone" => $dataPayer['phone'],
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCustomer($idClient, $customer)
    {
        $customerEpayco = $this->epayco->customer->get($idClient);
        if (!$customerEpayco) {
            return $this->createCustomer($customer);
        }
        return $customerEpayco;
    }


    public function createToken($card)
    {
        return $this->epayco->token->create(array(
            "card[number]" => $card['number'],
            "card[exp_year]" => $card['exp_year'],
            "card[exp_month]" => $card['exp_month'],
            "card[cvc]" => $card['cvc']
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pay($idClient, $tokenCard, $dataPayer, $transactionId, $description, $customer, $ip)
    {
        return $this->epayco->charge->create(array(

            "token_card" => $tokenCard->id,
            "customer_id" => $idClient,
            "doc_type" => $dataPayer['documentType'],
            "doc_number" => $dataPayer['documentNumber'],
            "name" => $dataPayer['name'],
            "last_name" => $dataPayer['lastName'],
            "email" => $dataPayer['email'],
            "value" => $dataPayer['value'],
            "currency" => "COP",
            "bill" => "OR-" . $transactionId,
            "description" => $description,
            "tax" => "16000",
            "tax_base" => "100000",
            "dues" => "12",
            "address" => $customer->address,
            "city" => "Medellín",
            "country" => "CO",
            "phone" => $customer->phone,
            "ip" => $ip,
            // "url_response" => "",
            // "url_confirmation" => "",
            // "method_confirmation" => "GET"
        ));
    }

    public function payment($customer, $card, $dataPayer, $transactionId, $description, $ip)
    {
        $tokenCard = $this->createToken($card);
        $idClient = $this->createCustomer($dataPayer)->data->customerId;
        return $this->pay($idClient, $tokenCard, $dataPayer, $transactionId, $description, $customer, $ip);
    }
}
