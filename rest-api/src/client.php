<?php
$options = [
    'location' => 'http://soap/soap_service.php',
    'uri' => 'http://soap/',
    'trace' => 1,
];

try {
    $client = new SoapClient(null, $options);
    $result = $client->sayHello($_GET["name"]);
    echo $result;
} catch (SoapFault $fault) {
    echo "Error: " . $fault->faultstring;
}
