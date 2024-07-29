<?php
// really simple script to get weather data from SOAP service and return it as JSON

header('Access-Control-Allow-Origin: *');

if(!isset($_GET["city"])) {
    echo json_encode(["error" => "City name is required", "cod" => 400]);
    exit;
}

$options = [
    'location' => 'http://soap/soap_service.php',
    'uri' => 'http://soap/',
    'trace' => 1,
];

try {
    $client = new SoapClient(null, $options);
    $result = $client->getWeatherData($_GET["city"]);
    echo $result;
} catch (SoapFault $fault) {
    echo json_encode(['error' => $fault->getMessage(), "cod" => $fault->getCode()]);
}