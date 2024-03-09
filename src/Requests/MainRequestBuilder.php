<?php

namespace Hamzahassanm\NamecheapApi\Requests;

use Hamzahassanm\NamecheapApi\Enums\State;
use Illuminate\Support\Facades\Http;

class MainRequestBuilder {

    public string $url;

    public array $fixed_params;

    public function __construct() {
        $this->prepareUrlData();
    }

    public function getUri() {

        return $this->url;
    }

    private function setSandBoxFullUrl() {
        $config = config('namecheap.sandbox');
        $this->url = $config['api_url'];
        $this->setFixedParams($config);
    }

    private function setProductionFullUrl() {
        $config = config('namecheap.production');
        $this->url = $config['api_url'];
    }

    private function setFixedParams($config) {
        $this->fixed_params = [
            'ApiUser'  => $config['username'],
            'ApiKey'   => $config['api_key'],
            'UserName' => $config['username'],
            'ClientIp' => $config['client_ip'],
        ];
    }


    private function prepareUrlData() {
        $state = config('namecheap.default');

        switch ($state) {
            case State::PRODUCTION->value :
                $this->setProductionFullUrl();

            case State::SANDBOX->value:
            default :
                $this->setSandBoxFullUrl();
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

    public function getDomainsList() {
        return $this->get(['Command' => 'namecheap.domains.getList']);
    }


    public function getDomainsPrices() {
        return $this->get(['Command' => 'namecheap.users.getPricing' , 'ProductType' => 'DOMAIN']);
    }

    public function getDomainsInfo(string $domain , string $hostname = null ) {
        $params = ['Command' => 'namecheap.domains.getinfo' , 'DomainName' => $domain];
        if (!is_null($hostname)){
            $params = array_merge($params,['HostName' => $hostname]);
        }
        return $this->get($params);
    }

    public function checkDomains(string $name , string $suffix = null  , bool $all = true) {
        $params = ['Command' => 'namecheap.domains.check' , 'DomainList' => $name];
        if (!is_null($suffix)){
            $params = array_merge($params,['DomainList' => $name.'.'.$suffix]);
        }
        return $this->get($params);
    }


    public function getTldDomainList() {
        return $this->get(['Command' => 'namecheap.domains.gettldlist']);

    }
}