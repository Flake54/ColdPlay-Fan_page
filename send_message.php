<?php
session_start();
require 'db.php';

if (isset($_POST['message']) && isset($_SESSION['user_id'])) {
    $message = $_POST['message'];
    $userId = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $message);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
