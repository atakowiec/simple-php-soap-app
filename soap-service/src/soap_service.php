<?php
ini_set("soap.wsdl_cache_enabled", "0");

class SoapService {
    public function getWeatherData($city) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?q=$city&appid={$_ENV['weather-api-key']}&units=metric");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}

$options = ['uri' => 'http://soap/'];
$server = new SoapServer(null, $options);
$server->setClass('SoapService');
$server->handle();
