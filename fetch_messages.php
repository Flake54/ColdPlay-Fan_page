<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT messages.message, messages.timestamp, messages.user_id, user_form.name, user_form.image FROM messages JOIN user_form ON messages.user_id = user_form.id ORDER BY messages.timestamp ASC");

while ($row = $result->fetch_assoc()) {
    $isCurrentUser = ($user_id == $row['user_id']);
    $messageClass = $isCurrentUser ? 'my-message' : 'other-message';
    
    echo '<div class="message ' . $messageClass . '">';
    
    if (!$isCurrentUser) {
        echo '<img src="uploaded_img/' . htmlspecialchars($row['image']) . '" alt="User Profile Picture" title="' . htmlspecialchars($row['name']) . '" class="profile-picture">';
    }
    
    echo '<div class="text">' . htmlspecialchars($row['message']) . '</div>';
    echo '<div class="tooltip">' . htmlspecialchars($row['name']) . '</div>';
    echo '<div class="timestamp">' . date('g:i A', strtotime($row['timestamp'])) . '</div>';
    echo '</div>';
}

$conn->close();
?>
