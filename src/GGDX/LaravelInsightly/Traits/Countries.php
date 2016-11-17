<?php namespace GGDX\LaravelInsightly\Traits;

trait Countries{

    /**
     * Get all countries used by Insightly
     *
     * @return object
     */
    public function GetCountries()
    {
        return $this->call('get','Countries');
    }
}
