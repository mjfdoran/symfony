<?php
/**
 * Created by PhpStorm.
 * User: matthewdoran
 * Date: 04/06/16
 * Time: 12:39
 */

interface HttpClientInterface{

    public function makeRequest($type, $url);
}