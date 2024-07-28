<?php
ini_set("soap.wsdl_cache_enabled", "0");

class SoapService {
    public function sayHello($name) {
        return "Hello, " . $name;
    }
}

$options = ['uri' => 'http://soap/'];
$server = new SoapServer(null, $options);
$server->setClass('SoapService');
$server->handle();
