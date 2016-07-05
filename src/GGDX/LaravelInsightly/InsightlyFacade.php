<?php namespace GGDX\LaravelInsightly;

class InsightlyFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ggdx.insightly';
    }
}
