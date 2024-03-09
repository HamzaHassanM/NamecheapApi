<?php

namespace Hamzahassanm\NamecheapApi;

use Illuminate\Support\ServiceProvider;

class NamceCheapApiServiceProvider extends  ServiceProvider {
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/namecheap.php' => config_path('namecheap.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/namecheap.php', 'namecheap');
    }

}