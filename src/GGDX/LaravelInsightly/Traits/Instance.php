<?php namespace GGDX\LaravelInsightly\Traits;

trait Instance{

    /**
     * Gets the instance
     *
     * @return object
     */
    public function getInstance()
    {
        return $this->call('get','Instance');
    }
}
