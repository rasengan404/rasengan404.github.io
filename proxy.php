<?php
  // Get the Python code from the request
  $code = $_GET['code'];

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

  // Append the request data to the API endpoint URL
  $url .= '?' . http_build_query($data);

  // Create a new cURL handle
  $ch = curl_init();

  // Set the cURL options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute the request and get the response
  $response = curl_exec($ch);

  // Close the cURL handle
  curl_close($ch);

  // Return the response to the client
  echo $response;
?>
