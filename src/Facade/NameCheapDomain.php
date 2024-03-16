<?php

namespace Hamzahassanm\NamecheapApi\Facade;
use Illuminate\Support\Facades\Facade;

class NameCheapDomain extends Facade {

    /**
     * @see \Hamzahassanm\NamecheapApi\Requests\DomainRequests
     * @method static getDomainsList()
     * @method static getDomainsPrices()
     * @method static getDomainsInfo(string $domain, string $hostname = null)
     * @method static checkDomains(string $name, string $domain_suffix = null, bool $all = true)
     * @method static getTldDomainList()
     * @method static getDomainContacts(string $domainName)
     * @method static setDomainContacts($params)
     * @method static reactivateDomain(string $domain_name, string $promotion_code = null, int $numbers_of_years = null, bool $is_premium_domain = false, float $premium_price = null)
     * @method static renewDomain(string $domain_name, string $promotion_code = null, int $numbers_of_years = null, bool $is_premium_domain = false, float $premium_price = null)
     * @method static getRegistrarLock(string $domain)
     * @method static setRegistrarLock(string $domain, string $lock_action = 'LOCK')
     */


    protected static function getFacadeAccessor(): string {
        return 'namecheapdomain';
    }

}