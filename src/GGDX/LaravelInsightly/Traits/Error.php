<?php namespace GGDX\LaravelInsightly\Traits;

trait Error{

    protected function set_error($data)
    {
        $this->error['errors'][] = $data;
    }
}
