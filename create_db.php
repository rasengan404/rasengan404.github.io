<?php
$db = new SQLite3('users.db');

// Create users table
$db->exec("CREATE TABLE IF NOT EXISTS users (username TEXT PRIMARY KEY, password TEXT)");

// Close database connection
$db->close();
?>
