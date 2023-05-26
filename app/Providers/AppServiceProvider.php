<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(Post::all());

        // $response = Http::get('https://nbu.uz/en/exchange-rates/json');
        // dd(json_decode($response));
        
    }
}
