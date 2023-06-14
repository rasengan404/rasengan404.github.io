<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $username = $_SESSION['username'];

    // Connect to SQLite database
    $db = new SQLite3('codes.db');

    // Create codes table if it doesn't exist
    $db->exec("CREATE TABLE IF NOT EXISTS codes (id INTEGER PRIMARY KEY AUTOINCREMENT, username TEXT, code TEXT)");

    // Insert code into database
    $stmt = $db->prepare("INSERT INTO codes (username, code) VALUES (:username, :code)");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':code', $code, SQLITE3_TEXT);
    $stmt->execute();

    $id = $db->lastInsertRowID();

    echo 'Kods tika saglabāts ar ID: ' . $id;

    // Close database connection
    $db->close();
}
?>
