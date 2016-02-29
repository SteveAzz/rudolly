<?php

namespace SteveAzz\RuDolly;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RuDollyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function ($expression) {
            return "<?php if (! app('SteveAzz\RuDolly\BladeDirective')->setUp{$expression}) : ?>";
        });

        Blade::directive('endcache', function () {
            return "<?php endif; echo app('SteveAzz\RuDolly\BladeDirective')->tearDown() ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeDirective::class);
    }
}
