<?php


namespace App\wpConnect;

/**
 * Class wpConnect
 * @package App\wpConnect
 */
class wpConnect
{
    public $method;
    public $path;
    public $apiKey;
    public $secret;
    public $query;
    public $data;

    /**
     * wpConnect constructor.
     * @param $method
     * @param $path
     * @param $apiKey
     * @param $secret
     * @param null $data
     * @param null $query
     */
    public function __construct($method, $path,$apiKey,$secret,$data = null,$query = null)
    {
        $this->method = $method;
        $this->path = $path;
        $this->apiKey = $apiKey;
        $this->secret = $secret;
        $this->query = $query;
        $this->data = $data;
    }

    /**
     * If insert true -> send data for item
     * @param false $insert
     * @return mixed
     */
    public function connect(bool $insert = false)
    {
        $time = time();
        $canonicalRequest = sprintf('%s %s %s', $this->method, $this->path, $time);
        $signature = hash_hmac('sha1', $canonicalRequest, $this->secret);

        $param = curl_init();
        curl_setopt($param, CURLOPT_URL, sprintf('%s%s%s', 'https://rest.websupport.sk', $this->path, $this->query));
        curl_setopt($param, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($param, CURLOPT_RETURNTRANSFER, 1);


        if ($insert == true) {
            curl_setopt($param, CURLOPT_POSTFIELDS, json_encode($this->data));
        }

        curl_setopt($param, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($param, CURLOPT_USERPWD, $this->apiKey . ':' . $signature);
        curl_setopt($param, CURLOPT_HTTPHEADER, array(
            'Date: ' . gmdate('Ymd\THis\Z', $time),
            'Accept: application/json',
            'Content-Type: application/json')
        );
        $response = curl_exec($param);
        curl_close($param);
        return json_decode($response);
    }

}

