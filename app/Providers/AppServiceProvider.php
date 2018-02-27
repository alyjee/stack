<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $commonHelperFile = glob(base_path('app') . '/Helpers/CommonHelper.php');
        foreach ($commonHelperFile as $filename) {
            require_once($filename);
        }
        foreach (glob(base_path('app') . '/Helpers/*.php') as $filename) {
            if (strpos($filename, 'CommonHelper.php') !== false) {
                continue;
            }
            require_once($filename);
        }
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
