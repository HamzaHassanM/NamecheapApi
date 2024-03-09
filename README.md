## Laravel NameCheap API Packages 



## Installation

You can install the package via composer:

```bash
composer require hamzahassanm/namecheap-api
```

Optionally, you can publish the config file with:

```bash
php artisan vendor:publish --tag=config --provider="Hamzahassanm\NamecheapApi\NamceCheapApiServiceProvider"
```

## Usage
- Set NameCheap credentials inside `.env` file
```bash
NAME_CHEAP_USER_NAME        = xxxxxxxxxxxxxxxxxxxxxx
NAME_CHEAP_CLIENT_IP = xxxxxxxxxxxxxxxxxx
NAME_CHEAP_APU_KEY      = xxxxxxxxxxxxxxx

```
Reference: [Namecheap API](https://www.namecheap.com/support/api/intro/)

