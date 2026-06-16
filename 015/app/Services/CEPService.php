<?php

namespace App\Services;

class CEPService
{

    public function consultaCep(String $cep)
    {
        $url = "https://brasilapi.com.br/api/cep/v2/{$cep}";

        try {
            $client = service("curlrequest");

            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);

            $response = $client->get($url);

            return [
                "status" => "success",
                "data" => $data
            ];
        } catch (\Throwable $th) {
            return [
                "status" => "error",
                "msg" => $th->getMessage()
            ];
        }
    }
}
