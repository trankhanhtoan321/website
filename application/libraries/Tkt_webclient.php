<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkt_webclient
{
    var $client;
    /**
    * param is array
    * param include: host
    */
    function __construct($params){
        require_once APPPATH.'third_party/class.httpclient.php';
        $this->client = new HttpClient($params['host']);
    }

    /*method request*/
    function get($path, $data = false){
        return $this->client->get($path, $data = false);
    }
    function post($path, $data){
        return $this->client->post($path, $data);
    }

    /*set*/
    function setUserAgent($string){
        $this->client->setUserAgent($string);
    }
    function setAuthorization($username, $password){
        $this->client->setAuthorization($username, $password);
    }
    function setCookies($array){
        $this->client->setCookies($array);
    }
    function setContentType($string){
        $this->client->setContentType($string);
    }
    function setAccept($s){
        $this->client->setAccept($s);
    }
    function setAccept_encoding($s){
        $this->client->setAccept_encoding($s);
    }
    function setAccept_language($s){
        $this->client->setAccept_language($s);
    }

    /*get*/
    function getCookies(){
        return $this->client->getCookies();
    }
    function getHeader($header){
        return $this->client->getHeader($header);
    }
    function getHeaders(){
        return $this->client->getHeaders();
    }
    function getError(){
        return $this->client->getError();
    }
    function getStatus(){
        return $this->client->getStatus();
    }
    function getContent(){
        return $this->client->getContent();
    }
}