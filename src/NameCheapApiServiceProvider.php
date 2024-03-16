<?php

namespace Hamzahassanm\NamecheapApi;


use Hamzahassanm\NamecheapApi\Requests\DomainRequests;
use Illuminate\Support\ServiceProvider;

class NameCheapApiServiceProvider extends  ServiceProvider {
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/namecheap.php' => config_path('namecheap.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/namecheap.php', 'namecheap');
        $this->app->singleton('domain', function ($app) {
            return new DomainRequests();
        });
    }

}