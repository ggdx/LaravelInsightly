<?php namespace  DanW1\LaravelInsightly;

use Exception;
use InvalidArgumentException;
use GuzzleHttp\Psr7\Request;
class InsightlyRequest{

    // CLient constants
    const REQ_POST = 'POST';
    const REQ_PUT = 'PUT';
    const REQ_GET = 'GET';
    const REQ_DELETE = 'DELETE';

    // Endpoint starts here
    private $base_url = "https://api.insight.ly/";

    // Build errors
    private $errors = [];

    // The other bits
    private $key;


    /**
     * Constructor
     *
     *
     * @param str key   API key
     * @return
     * @throws Exception
     */

    public function __construct($key = false)
    {
        if(!$key){
            throw new Exception("You need an API key");
        }
        $this->key = $key;

    }



    /**
     * Errors
     *
     *
     * @return string|array|bool
     */
    public function errors()
    {
        return $this->errors;
    }



    /**
     * Post
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function post($url, array $data = [])
    {
        return $this->request(self::REQ_POST,$url, $data);
    }



    /**
     * Put
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function put($url, array $data = [])
    {
        return $this->request(self::REQ_POST,$url, $data);
    }



    /**
     * Get
     *
     *
     * @param str url Endpoint
     * @return string|bool|null
     */
    public function get($url)
    {
        return $this->request(self::REQ_GET,$url);
    }




    /**
     * Delete
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function delete($url, array $data = [])
    {
        return $this->request(self::REQ_DELETE,$url, $data);
    }




    /**
     * Request
     *
     * The meat of the provider.
     *
     * @param const method
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    private function request($method, $url, $data = [])
    {



        // Initialize client
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => 'Basic '.base64_encode($this->key.':')
            ]
        ]);
        //dd($client);
        switch ($method) {
            case 'GET':
                $request = new Request($method, $url);
                break;

            default:
                $request = new Request($method, $url);
                break;
        }
        $response = $client->send($request);
        //dd($response);
        try {
            $response = $client->send($request);
            //dd($response);
        } catch (Exception $e) {
            $this->errors = [$e->getMessage()];
            $response = false;
        }

        return $response;

    }

}
