<?php namespace GGDX\LaravelInsightly\Traits;

trait Currencies{

    /**
     * Get all currencies used by Insightly
     *
     * @return object
     */
    public function getCurrencies()
    {
        return $this->call('get','Currencies');
    }
}
