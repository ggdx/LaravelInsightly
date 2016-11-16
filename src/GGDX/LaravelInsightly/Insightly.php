<?php namespace GGDX\LaravelInsightly;

use Exception;

class Insightly{

    use GGDX\LaravelInsightly\Traits\ActivitySets;
    use GGDX\LaravelInsightly\Traits\Comments;
    use GGDX\LaravelInsightly\Traits\Error;


    private $request;

    public $error = [];


    public function __construct($config)
    {
        $this->request = new InsightlyRequest(config('insightly.api_key'));
    }


    public function call($http_method, $endpoint, $data)
    {
        if(count($this->error)){
            return $this->error;
        }

        return !count($data) ? $this->request->$http_method($endpoint) : $this->request->$http_method($endpoint, $data);
    }

}
