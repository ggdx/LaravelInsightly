<?php namespace GGDX\LaravelInsightly;

use Exception;

class Insightly{

    use GGDX\LaravelInsightly\Traits\ActivitySets;
    use GGDX\LaravelInsightly\Traits\Comments;
    use GGDX\LaravelInsightly\Traits\Contacts;
    use GGDX\LaravelInsightly\Traits\Countries;
    use GGDX\LaravelInsightly\Traits\Error;


    private $request, $api_version;

    public $error = [];


    public function __construct($config)
    {
        $this->request = new InsightlyRequest(config('insightly.api_key'));

        $this->api_version = config('insightly.api_version');
    }


    public function call($http_method = false, $endpoint = false, array $data = [])
    {
        if(!$http_method){
            $this->set_error('call() - $http_method is required');
        }

        if(!$endpoint){
            $this->set_error('call() - $endpoint is required');
        }

        if(count($this->error)){
            return $this->error;
        }

        $endpoint = $this->api_version.'/'.$endpoint;

        return !count($data) ? $this->request->$http_method($endpoint) : $this->request->$http_method($endpoint, $data);
    }


    /**
     * Uppercase array keys
     *
     * Insightly insists on the use of UPPERCASE KEYS, let's face it - it's both a ball-ache and just not natural.
     * This method will format keys accordingly.
     *
     * @param array $data Associative array to ship off to Insightly
     * @return array
     */
    private function dataKeysToUpper($data)
    {
        foreach ($data as $key => $value) {
            $data[strtoupper($key)] => $value;
            unset($data[$key]);
        }

        return $data;
    }
}
