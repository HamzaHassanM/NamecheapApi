<?php

namespace Hamzahassanm\NamecheapApi\Requests;

use Hamzahassanm\NamecheapApi\Enums\Commands;

class DomainRequests extends MainRequest {

    public function getDomainsList() {
        return $this->get(['Command' => Commands::GET_DOMAINS_LIST->value]);
    }


    public function getDomainsPrices() {
        return $this->get(['Command' => Commands::GET_DOMAIN_PRICES->value, 'ProductType' => 'DOMAIN']);
    }

    public function getDomainsInfo(string $domain, string $hostname = null) {
        $params = ['Command' => Commands::GET_DOMAINS_INFO->value, 'DomainName' => $domain];
        if (!is_null($hostname)) {
            $params = array_merge($params, ['HostName' => $hostname]);
        }
        return $this->get($params);
    }


    public function checkDomains(string $name, string $suffix = null, bool $all = true) {
        $params = ['Command' => Commands::CHECK_DOMAIN->value, 'DomainList' => $name];
        if (!is_null($suffix)) {
            $params = array_merge($params, ['DomainList' => $name . '.' . $suffix]);
        }
        return $this->get($params);
    }


    public function getTldDomainList() {
        return $this->get(['Command' => Commands::GET_TLD_LIST->value]);
    }

    public function getDomainContacts(string $domainName) {
        return $this->get(['Command' => Commands::GET_DOMAIN_CONTACTS->value, 'DomainName' => $domainName]);
    }


    /**
     * @throws \Exception
     */
    public function setDomainContacts($params) {
        $params['Command'] = Commands::SET_DOMAIN_CONTACTS->value;
        $requiredParams = config('namecheap.domain_contacts_required_params');

        foreach ($requiredParams as $param) {
            if (!isset($params[$param])) {
                throw new \Exception("Error: Missing required parameter '$param'");
            }
        }

        return $this->get($params);
    }

    public function reactivateDomain(string $domain_name, string $promotion_code = null, int $numbers_of_years = null, bool $is_premium_domain = false, float $premium_price = null) {
        $params['Command'] = Commands::REACTIVE_DOMAIN->value;
        $params['DomainName'] = $domain_name;
        if (!is_null($promotion_code)) {
            $params['PromotionCode'] = $promotion_code;
        }
        if (!is_null($numbers_of_years)) {
            $params['YearsToAdd'] = $numbers_of_years;
        }

        if ($is_premium_domain) {
            $params['IsPremiumDomain'] = $is_premium_domain;
        }

        if (!is_null($premium_price)) {
            $params['PremiumPrice'] = $premium_price;
        }
        return $this->get($params);
    }


    public function renewDomain(string $domain_name, string $promotion_code = null, int $numbers_of_years = null, bool $is_premium_domain = false, float $premium_price = null) {
        $params['Command'] = Commands::RENEW_DOMAIN->value;
        $params['DomainName'] = $domain_name;
        if (!is_null($promotion_code)) {
            $params['PromotionCode'] = $promotion_code;
        }
        if (!is_null($numbers_of_years)) {
            $params['Years'] = $numbers_of_years;
        }

        if ($is_premium_domain) {
            $params['IsPremiumDomain'] = true;
        }

        if (!is_null($premium_price)) {
            $params['PremiumPrice'] = $premium_price;
        }
        return $this->get($params);
    }

    public function getRegistrarLock(string $domain) {
        return $this->get(['Command' => Commands::GET_REGISTRAR_LOCK->value, 'DomainName' => $domain]);
    }

    /**
     * @throws \Exception
     */
    public function setRegistrarLock(string $domain, string $lock_action = 'LOCK') {
        if (!in_array($lock_action, ['LOCK', 'UNLOCK'])) {
            throw new \Exception('lock domain should be in : ' . implode(',' , ['LOCK', 'UNLOCK']));
        }
        return $this->get(['Command' =>Commands::SET_REGISTRAR_LOCK->value, 'LockAction' => $lock_action]);
    }



}