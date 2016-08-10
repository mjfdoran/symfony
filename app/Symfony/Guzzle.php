<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

/**
 * Created by PhpStorm.
 * User: matthewdoran
 * Date: 04/06/16
 * Time: 12:31
 */

class Guzzle implements HttpClientInterface{

    private $client;
    public $headerLink;
    public $previous = false;
    public $next = false;

    function __construct()
    {
        $this->client = new Client();
        $this->exceptionHanlder = ExceptionHandler::getInstance();
    }

    
    /**
     * This class makes accepts get and post requests and returns results
     * @param $type
     * @param $url
     * @param bool $headerLink
     * @return bool|mixed
     */
    public function makeRequest($type, $url, $headerLink = false)
    {
        try{
            $response = $this->client->request($type, $url);
        } catch (RequestException $e) {

            $request = Psr7\str($e->getRequest());
            $message = $e->getMessage();
            $code = $e->getCode();
            if ($e->hasResponse()) {
                $response = Psr7\str($e->getResponse());
            } else {
                $response = false;
            }
            $clientMessage = 'Your api request failed with error code ' . $code;
            $this->exceptionHanlder->addMessage($request, $message, $code, $response, $clientMessage);
            return false;
        }

        if ($headerLink !== false) {
            $this->headerLink = $response->getHeader('Link')[0];
        }

        $result = \GuzzleHttp\json_decode($response->getBody());

        return $result;
    }
}