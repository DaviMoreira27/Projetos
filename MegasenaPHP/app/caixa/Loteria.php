<?php

namespace App\Caixa;

use const http\Client\Curl\Versions\CURL;

class Loteria{

    const URL_BASE = 'https://servicebus2.caixa.gov.br/portaldeloterias/api';

    public  static function consultarResultado($loteria, $concurso = null){

//            Endpoint

        $endpoint = self::URL_BASE . '/'. $loteria . '/'
            . $concurso;

//        Inicia curl

        $curl = curl_init();

        curl_setopt_array($curl, [
           CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

//        EXECUTA O CURL

        $response = curl_exec($curl);

//        Fecha o Curl

        curl_close($curl);

        return strlen($response) ? json_decode($response,
            true) : [];
    }

}