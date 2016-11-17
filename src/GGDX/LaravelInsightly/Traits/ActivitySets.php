<?php namespace GGDX\LaravelInsightly\Traits;

trait ActivitySets{

    /**
     * Get activity sets
     *
     * @param int $id Activity set ID
     * @return object
     */
    public function getActivitySets($id = false)
    {
        return !$id ? $this->call('get','ActivitySets') : $this->call('get','ActivitySets/'.$id);
    }
}
