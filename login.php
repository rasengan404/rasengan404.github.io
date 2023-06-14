<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to SQLite database
    $db = new SQLite3('users.db');

    // Check if username exists
    $hashedPassword = $db->querySingle("SELECT password FROM users WHERE username='$username'");
    if ($hashedPassword) {
        // Verify password
        if (password_verify($password, $hashedPassword)) {
            echo 'Pieteikšanās veiksmīga.';
        } else {
            echo 'Nepareiza parole.';
        }
    } else {
        echo 'Lietotājvārds nav atrasts.';
    }

    // Close database connection
    $db->close();
}
?>
