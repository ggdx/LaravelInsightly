<?php namespace GGDX\LaravelInsightly\Traits;

trait ActivitySets{

    /**
     * Get activity sets
     *
     * @param int $id Activity set ID
     * @return object
     */
    public function GetActivitySets($id = false)
    {
        return !$id ? $this->call('get','v2.2/ActivitySets') : $this->call('get','v2.2/ActivitySets/'.$id);
    }
}
