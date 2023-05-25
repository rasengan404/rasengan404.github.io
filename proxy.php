<?php
  $code = $_POST['code'];
  $url = 'https://api.jdoodle.com/v1/execute';
  $clientId = 'd6f56fb62c9cb394210a2c7425cc93c7';
  $clientSecret = '7126aeb78dce69e151ab4bb252d8b1b91b2933c6b5ffaadd73685a1401592ed';

  $data = array(
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'language' => 'python3',
    'versionIndex' => 3,
    'script' => $code
  );

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  $response = curl_exec($ch);

  curl_close($ch);

  echo $response;
?>
