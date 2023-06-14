<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Connect to SQLite database
    $db = new SQLite3('codes.db');

    // Retrieve code from database
    $stmt = $db->prepare("SELECT code FROM codes WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if ($row) {
        echo $row['code'];
    }

    // Close database connection
    $db->close();
}
?>
