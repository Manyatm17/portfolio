<?php
include "config.php";

$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");

echo "<h2>Stored Messages</h2>";
echo "<hr>";

while($row = $result->fetch_assoc()) {
    echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
    echo "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
    echo "<p><em>" . $row['created_at'] . "</em></p>";
    echo "<hr>";
}
?>
