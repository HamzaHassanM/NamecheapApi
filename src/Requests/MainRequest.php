<?php

namespace Hamzahassanm\NamecheapApi\Requests;

use Hamzahassanm\NamecheapApi\Enums\State;
use Illuminate\Support\Facades\Http;

abstract  class MainRequest {

    public string $url;

    public array $fixed_params;

    public function __construct() {
        $this->prepareUrlData();
    }

    public function getUri(): string {

        return $this->url;
    }

    private function setSandBoxUrl(): void {
        $config = config('namecheap.sandbox');
        $this->url = $config['api_url'];
        $this->setFixedParams($config);
    }

    private function setProductionUrl(): void {
        $config = config('namecheap.production');
        $this->url = $config['api_url'];
    }

    private function setFixedParams($config): void {
        $this->fixed_params = [
            'ApiUser'  => $config['username'],
            'ApiKey'   => $config['api_key'],
            'UserName' => $config['username'],
            'ClientIp' => $config['client_ip'],
        ];
    }


    private function prepareUrlData(): void {
        $state = config('namecheap.default');

        switch ($state) {
            case State::PRODUCTION->value :
                $this->setProductionUrl();

            case State::SANDBOX->value:
            default :
                $this->setSandBoxUrl();
        }
    }


    public function get(array $params) {
        $params = array_merge($this->fixed_params, $params);

        try {
            $response = Http::get($this->url, $params);
        }catch (\Exception $e){
            return $e;
        }
        $body = $response->getBody()->getContents();
        $xmlResponse = simplexml_load_string($body);
       return  $arrayResponse = json_decode(json_encode($xmlResponse), true);
    }
}