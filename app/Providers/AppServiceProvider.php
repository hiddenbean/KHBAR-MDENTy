<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Schema DB connection
use Illuminate\Support\Facades\Schema;
//Add a mapping for the polymorphic relationships
use Illuminate\Database\Eloquent\Relations\Relation;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Fixing "SQLSTATE[42000] - key was too long" - by Hicham
        Schema::defaultStringLength(191);
        Relation::morphMap([
            'partner_account' => 'App\PartnerAccount',
            'partner' => 'App\Partner',
         ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
