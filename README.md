# Namecheap API Wrapper Package

This package provides a wrapper for interacting with the Namecheap API. It allows you to perform various domain-related operations such as retrieving domain information, managing domain contacts, renewing domains, and more.


## Installation

You can install this package via Composer. Run the following command in your terminal:

```bash
composer require hamzahassanm/namecheap-api
```

Optionally, you can publish the config file with:

```bash
php artisan vendor:publish --tag=config --provider="Hamzahassanm\NamecheapApi\NameCheapApiServiceProvider"
```

## Usage
- Set NameCheapAPI credentials in `.env` file
```bash
NAME_CHEAP_USER_NAME        = xxxxxxxxxxxxxxxxxxxxxx
NAME_CHEAP_CLIENT_IP        = xxxxxxxxxxxxxxxxxx
NAME_CHEAP_APU_KEY          = xxxxxxxxxxxxxxx

```
- To use this package, you need to utilize the `NameCheapDomain` facade. Here's how you can use each method

## Examples 
```php
use Hamzahassanm\NamecheapApi\Facades\Namecheap;

// Get a list of domains
$domains = Namecheap::getDomainsList();

// Get prices for domains
$prices = Namecheap::getDomainsPrices();

// Get information about a specific domain
$domainInfo = Namecheap::getDomainsInfo('example.com');

// Check domain availability
$availability = Namecheap::checkDomains('example' , 'com');

// Get a list of available top-level domains
$tldList = Namecheap::getTldDomainList();

// Get contacts for a specific domain
$contacts = Namecheap::getDomainContacts('example.com');

// Set contacts for a domain
$params = [
    // Contact information
];
Namecheap::setDomainContacts($params);

// Reactivate a domain
Namecheap::reactivateDomain('example.com');

// Renew a domain
Namecheap::renewDomain('example.com');

// Get registrar lock status for a domain
$lockStatus = Namecheap::getRegistrarLock('example.com');

// Set registrar lock status for a domain
Namecheap::setRegistrarLock('example.com', 'UNLOCK');
```

Reference: [Namecheap API](https://www.namecheap.com/support/api/intro/)



## Contribution

Contributions are welcome! If you encounter issues or have improvements, feel free to open an issue or submit a pull request.


## License

This package is open-source and available under the MIT License.