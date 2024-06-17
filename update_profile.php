<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db.php'; // Ensure you have a connection to your database

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $userId = $_SESSION['user_id'];
    $profile_picture = $_SESSION['image'];

    // Handle file upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $targetDir = "uploaded_img/";
        $targetFile = $targetDir . basename($_FILES['profile_picture']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES['profile_picture']['tmp_name']);
        if ($check !== false) {
            // Check file size (optional)
            if ($_FILES['profile_picture']['size'] <= 500000) {
                // Allow certain file formats (optional)
                if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFile)) {
                        // Update the session and database with the new file path
                        $profile_picture = basename($_FILES['profile_picture']['name']);
                        $_SESSION['image'] = $profile_picture;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                echo "Sorry, your file is too large.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // Update the username and profile picture in the database
    $stmt = $conn->prepare("UPDATE user_form SET name=?, image=? WHERE id=?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssi", $username, $profile_picture, $userId);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect to index.php after updating profile
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Basic CSS for chat interface */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        #sidebar {
            width: 25%;
            background-color: #2c2f33;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            position: relative;
        }
        #sidebar img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        #sidebar h2 {
            margin: 20px 0 10px;
        }
        #sidebar p {
            margin: 5px 0;
        }
        #logout-btn {
            background-color: #7289da;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        #chat-container {
            width: 75%;
            display: flex;
            flex-direction: column;
        }
        #chat-box {
            flex: 1;
            padding: 20px;
            overflow-y: scroll;
            border-bottom: 1px solid #ccc;
        }
        #chat-box .message {
            margin: 10px 0;
        }
        #chat-input {
            display: flex;
            padding: 10px;
            background-color: #f1f1f1;
        }
        #chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        #chat-input button {
            padding: 10px 20px;
            border: none;
            background-color: #7289da;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
        }
        .edit-options {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }
        .edit-options form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .edit-options input[type="text"],
        .edit-options input[type="file"] {
            margin: 5px 0;
        }
        .edit-options button {
            margin-top: 10px;
        }
        .show {
            display: flex;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <img src="uploaded_img/<?php echo $_SESSION['image']; ?>" alt="User Profile Picture">
        <h2><?php echo $_SESSION['username']; ?></h2>
        <p><?php echo $_SESSION['email']; ?></p>
        <div class="edit-icon" onclick="toggleEditOptions()">✏️</div>
        <div class="edit-options" id="edit-options">
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                <input type="file" name="profile_picture">
                <button type="submit" name="update_profile">Update Profile</button>
            </form>
        </div>
        <form method="post">
            <button type="submit" id="logout-btn" name="logout">Logout</button>
        </form>
    </div>
    <div id="chat-container">
        <div id="chat-box"></div>
        <div id="chat-input">
            <input type="text" id="message" placeholder="Type a message...">
            <button id="send">Send</button>
        </div>
    </div>

    <script src="chat.js"></script>
    <script>
        function toggleEditOptions() {
            const editOptions = document.getElementById('edit-options');
            editOptions.classList.toggle('show');
        }

        const userId = <?php echo $_SESSION['user_id']; ?>;
        const username = "<?php echo $_SESSION['username']; ?>";
        const email = "<?php echo $_SESSION['email']; ?>";
        const image = "<?php echo $_SESSION['image']; ?>";

        document.getElementById('send').addEventListener('click', function() {
            const message = document.getElementById('message').value;
            if (message.trim() !== '') {
                // Here you would send the message to the server
                const chatBox = document.getElementById('chat-box');
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');
                messageElement.textContent = `${username}: ${message}`;
                chatBox.appendChild(messageElement);
                document.getElementById('message').value = '';
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        });
    </script>
</body>
</html>
