<?php namespace GGDX\LaravelInsightly\Traits;

trait Follows{

    /**
     * Get all followed records for user (API key owner)
     *
     * @return object
     */
    public function getFollows()
    {
        return $this->call('get','Follows');
    }
}
