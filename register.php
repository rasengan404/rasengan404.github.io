<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to SQLite database
    $db = new SQLite3('db/users.db');

    // Create users table if it doesn't exist
    $db->exec("CREATE TABLE IF NOT EXISTS users (username TEXT PRIMARY KEY, password TEXT)");

    // Check if username already exists
    $existingUser = $db->querySingle("SELECT username FROM users WHERE username='$username'");
    if ($existingUser) {
        echo 'Lietotājvārds jau eksistē.';
        exit();
    }

    // Insert user into database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $db->exec("INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");

    echo 'Reģistrācija veiksmīga.';

    // Close database connection
    $db->close();
}
?>
