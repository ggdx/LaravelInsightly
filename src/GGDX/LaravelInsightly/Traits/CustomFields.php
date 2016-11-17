<?php namespace GGDX\LaravelInsightly\Traits;

trait CustomFields{

    /**
     * Get all custom fields
     *
     * @return object
     */
    public function getCustomField()
    {
        return $this->call('get','CustomFields');
    }
}
