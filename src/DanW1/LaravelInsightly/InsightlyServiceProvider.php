<?php namespace DanW1\LaravelInsightly;

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
        if ($this->isLumen() == false) {
            $this->publishes([
                __DIR__ . '/config/insightly.php' => config_path('insightly.php'),
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('danw1.insightly', function ($app) {
            $config = $app->config->get('insightly', []);

            return new Insightly($config);
        });
    }

    /**
     * Check if package is running under Lumen app
     *
     * @return bool
     */
    protected function isLumen()
    {
        return str_contains($this->app->version(), 'Lumen') === true;
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
