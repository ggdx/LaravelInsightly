<?php namespace GGDX\LaravelInsightly;

use Illuminate\Support\ServiceProvider;

class InsightlyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/insightly.php' => config_path('insightly.php'),
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ggdx.insightly', function ($app) {
            $config = $app->config->get('insightly', []);

            return new Insightly($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
