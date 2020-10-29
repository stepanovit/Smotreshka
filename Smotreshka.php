<?php
/**
 * Smotreshka API
 * User: Stepanovit
 * Date: 16.03.2017
 *
 * VERSION = 0.1.2
 *
 */

require_once('Http.php');

class Smotreshka{
    public $operator;
    public $node;
    private $url;

    public function __construct($operator, $node){
        $this->operator = $operator;
        $this->node = $node;
        $this->url = 'https://'.$this->operator.'.'.$this->node.'.lfstrm.tv/v2/';
    }

    public function account_create($email, $login = null, $password = null ,$purchases = null, $info = null){
        $data = array(
            'email' => $email
        );
        if (isset($login)) $data['login'] = $login;
        if (isset($password)) $data['password'] = $password;
        if (isset($purchases)) $data['purchases'] = $purchases;
        if (isset($info)) $data['info'] = $info;

        $http = Http::post($this->url.'accounts', json_encode($data));
        return $http->json();
    }

    public function account_show($id){
        $http = Http::get($this->url.'accounts/'.$id);
        return $http->json();
    }

    public function account_update($id, $info){
        $http = Http::post($this->url.'accounts/'.$id, json_encode(array('info' => $info)));
        return $http->json();
    }

    public function account_reset_password($id, $password){
        if (isset($password)) {$data = array('password' => $password);} else {$data = array();}
        $http = Http::post($this->url.'accounts/'.$id.'/reset-password', json_decode($data));
        return $http->json();
    }

    public function account_delete($id){
        $http = Http::delete($this->url.'accounts/'.$id, json_encode(array()));
        return $http->json();
    }

    public function accounts($count = null, $page = null){
        $params = array();
        if (isset($page)) $params['page_num'] = $page;
        if (isset($count)) $data['page_sie'] = $count;

        if (count($params) > 0) $query = '?'.http_build_query($params);

        $http = Http::get($this->url.'accounts'.$query);
        return $http->json();
    }

    public function account_subscriptions($id){
        $http = Http::get($this->url.'accounts/'.$id.'/subscriptions');
        return $http->json();
    }

    public function account_subscription_create($id, $subscription_id){
        $data = array(
            'id' => $subscription_id,
            'valid' => true
        );

        $http = Http::post($this->url.'accounts/'.$id.'/subscriptions', json_encode($data));
        return $http->json();
    }

    public function account_subscription_delete($id, $subscription_id){
        $data = array(
            'id' => $subscription_id,
            'valid' => false
        );

        $http = Http::post($this->url.'accounts/'.$id.'/subscriptions', json_encode($data));
        return $http->json();
    }

    public function subscriptions(){
        $http = Http::get($this->url.'subscriptions');
        return $http->json();
    }
}