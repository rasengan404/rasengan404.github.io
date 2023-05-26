<?php
$code = $_POST['code'];
$result = exec("python -c \"" . addslashes($code) . "\" 2>&1");

echo json_encode(['output' => $result]);
?>
