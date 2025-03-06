<?php

namespace App\Providers;

use App\Models\Service;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('food', function (int $id) {
            $service= Service::withTrashed()->findOrFail($id);
          
            return $service->type=="food";
        });
        Blade::if('education', function (int $id) {
            $service= Service::withTrashed()->findOrFail($id);
          

            return $service->type=="education";
        });
        Blade::if('health', function (int $id) {
            $service= Service::withTrashed()->findOrFail($id);
           

            return $service->type=="health";
        });
        Blade::if('institution', function (int $id) {
         
           $service= Service::withTrashed()->findOrFail($id);

            return  $service->status=="institution";
        });
        Blade::if('contribution', function (int $id) {
            $service= Service::withTrashed()->findOrFail($id);
        

            return  $service->status=="contribution";
        });


        RateLimiter::for('check-password', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower("user".auth()->id().'|'.$request->ip()));

            return Limit::perDay(5)->by($throttleKey);
        });


    }
}