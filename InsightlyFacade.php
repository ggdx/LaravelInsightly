<?php namespace DanW1\LaravelInsightly;

class InsightlyFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'danw1.insightly';
    }
}
