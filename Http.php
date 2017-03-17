<?php
/**
 * Http class CURL wrapper
 * User: Stepanovit
 * Date: 16.03.2017
 *
 * VERSION = 0.0.1
 *
 */

class Http{
    private $curl;
    public $url;
    public $method;
    public $request;
    public $response;
    public $info;

    public function __construct($url, $method = 'GET', $data = '', $options = array()){
        $this->url = $url;
        $this->method = $method;
        $this->request = $data;
    }

    public static function get($url){
        $http = new Http($url);
        $http->process();
        return $http;
    }

    public static function post($url, $data){
        $http = new Http($url, 'POST', $data);
        $http->process();
        return $http;
    }

    public static function delete($url, $data){
        $http = new Http($url, 'DELETE', $data);
        $http->process();
        return $http;
    }

    public static function put($url, $data){
        $http = new Http($url, 'PUT', $data);
        $http->process();
        return $http;
    }

    public static function patch($url, $data){
        $http = new Http($url, 'PATCH', $data);
        $http->process();
        return $http;
    }

    public function process(){
        $this->curl = curl_init($this->url);
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        $this->set_options();
        $this->exec();
    }

    public function json(){
        return json_decode($this->response);
    }

    public function xml(){
        $xml = new SimpleXMLElement($this->response);
        return json_decode(json_encode($xml), FALSE);
    }

    private function set_options(){
        if($this->method !== 'GET'){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $this->method);
        }
        if($this->method == "PUT" || $this->method == "PATCH" || ($this->method == "POST") || ($this->method == "DELETE")) {
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->request);
        }
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    private function exec(){
        $result = curl_exec($this->curl);
        $this->info = curl_getinfo($this->curl);
        curl_close($this->curl);
        $this->response = $result;
    }
}