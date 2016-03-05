<?php namespace Dedicated\GoogleTranslate;

use Illuminate\Support\ServiceProvider;

class GoogleTranslateProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/google-translate.php';

        if (function_exists('config_path')) {
            $publishPath = config_path('google-translate.php');
        } else {
            $publishPath = base_path('config/google-translate.php');
        }

        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
