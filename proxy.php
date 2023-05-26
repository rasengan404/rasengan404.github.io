<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$code = $_GET['code'];
$url = 'https://api.jdoodle.com/v1/execute';
$clientId = 'd6f56fb62c9cb394210a2c7425cc93c7';
$clientSecret = '7126aeb78dce69e151ab4bb252d8b1b91b2933c6b5ffaadd73685a1401592ed';

$client = new Client();

$response = $client->post($url, [
    'json' => [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'language' => 'python3',
        'versionIndex' => 3,
        'script' => $code
    ],
    'headers' => [
        'Content-Type' => 'application/json'
    ]
]);

$output = json_decode($response->getBody(), true)['output'];
echo $output;
?>
