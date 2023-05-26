<?php
$code = $_GET['code'];

$command = 'python -c ' . escapeshellarg($code);

exec($command, $output, $exitCode);

if ($exitCode === 0) {
    echo json_encode(['output' => implode("\n", $output)]);
} else {
    echo json_encode(['error' => implode("\n", $output)]);
}
?>
