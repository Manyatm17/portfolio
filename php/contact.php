<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// FIX 1: InfinityFree blocks some POST submissions → decode raw input also
$_POST = json_decode(file_get_contents("php://input"), true) ?? $_POST;

include "config.php";

// FIX 2: Cloudflare IP override (optional)
if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Validate
if (!$name || !$email || !$message) {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message sent successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error"]);
}

$stmt->close();
$conn->close();
?>
