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
            'video' => 'App\Video',
            'picture' => 'App\Picture',
            'reaction_picture' => 'App\ReactionPicture',
            'comment' => 'App\Comment',
            'khbar' => 'App\Khbar',
            'reaction' => 'App\Reaction',
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
