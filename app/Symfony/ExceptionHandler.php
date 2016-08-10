<?php
/**
 * Created by PhpStorm.
 * User: matthewdoran
 * Date: 04/06/16
 * Time: 12:31
 */

class ExceptionHandler {

    private static $request;
    private static $message;
    private static $code;
    private static $response;
    private static $instance;
    private static $clientMessage;

    private function __construct(){}

    /**
     * Get the Exception Handler
     * @return ExceptionHandler
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new ExceptionHandler();
        }

        return self::$instance;
    }

    /**
     * Log a message and store a client friendly error message
     * @param bool $request
     * @param $message
     * @param $code
     * @param bool $response
     * @param bool $clientMessage
     */
    public function addMessage($request = false, $message, $code, $response = false, $clientMessage = false)
    {
        self::$request = $request;
        self::$message = $message;
        self::$code = $code;
        self::$response = $response;
        self::$clientMessage = $clientMessage;
        error_log('Failed request');
        error_log('Request:' . self::$request);
        error_log('Message:' . self::$message);
        error_log('Code:' . self::$code);
        error_log('Response:' . self::$response);
    }


    /**
     * Get a client message
     * @return string
     */
    public function getClientMessage()
    {
        if (self::$clientMessage == null){
            self::$clientMessage = 'Unknown error';
        }

        return self::$clientMessage;
    }
}