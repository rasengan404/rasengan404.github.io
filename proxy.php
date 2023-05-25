<?php
  // Get the Python code from the request
  $code = $_POST['code'];

  // Set the API endpoint URL
  $url = 'https://api.jdoodle.com/v1/execute';

  // Set the API credentials
  $clientId = 'd6f56fb62c9cb394210a2c7425cc93c7';
  $clientSecret = '7126aeb78dce69e151ab4bb252d8b1b91b2933c6b5ffaadd73685a1401592ed';

  // Set the request data
  $data = array(
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'language' => 'python3',
    'versionIndex' => 3,
    'script' => $code
  );

  // Create a new cURL handle
  $ch = curl_init();

  // Set the cURL options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  // Execute the request and get the response
  $response = curl_exec($ch);

  // Close the cURL handle
  curl_close($ch);

  // Return the response to the client
  echo $response;
?>