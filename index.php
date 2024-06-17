<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Basic CSS for chat interface */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        #sidebar {
            width: 25%;
            background-color: #E2DFD0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
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
            transition: background-color 0.3s;
        }

        #logout-btn:hover {
            background-color: #5a6bb5;
        }

        #chat-container {
            width: 75%;
            display: flex;
            flex-direction: column;
            background-image: url('./images/c150.jpg');
            background-size: cover;
            background-position: center;
        }

        #chat-box {
            flex: 1;
            padding: 20px;
            overflow-y: scroll;
            border-bottom: 1px solid #ccc;
        }

        #chat-box .message {
            display: flex;
            align-items: flex-end;
            margin: 10px 0;
            position: relative;
        }

        #chat-box .message img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
            cursor: pointer;
            position: relative;
        }

        #chat-box .message .text {
            max-width: 60%;
            padding: 10px;
            border-radius: 15px;
            position: relative;
        }

        #chat-box .message.my-message .text {
            background-color: #0084ff;
            color: #fff;
            margin-left: auto;
        }

        #chat-box .message.other-message .text {
            background-color: #e4e6eb;
            color: #000;
        }

        #chat-box .message .timestamp {
            font-size: 0.75em;
            color: #999;
            margin-left: 50px;
        }

        #chat-input {
            display: flex;
            padding: 10px;
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
            transition: background-color 0.3s;
        }

        #chat-input button:hover {
            background-color: #5a6bb5;
        }

        .tooltip {
            visibility: hidden;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -50px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        #chat-box .message:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }

        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 24px;
        }

        .edit-options {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .edit-options form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .edit-options input[type="text"],
        .edit-options input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-options button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #7289da;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-options button:hover {
            background-color: #5a6bb5;
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
        <div class="edit-icon" onclick="toggleEditOptions()"><i class="fa-solid fa-user-pen"></i></div>
        <div class="edit-options" id="edit-options">
            <form method="post" action="update_profile.php" enctype="multipart/form-data">
                <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required>
                <input type="file" name="profile_picture">
                <button type="submit" name="update_profile"><i class="fa-solid fa-floppy-disk"></i> Save</button> 
            </form>
        </div>
        <form method="post">
            <button type="submit" id="logout-btn" name="logout"><i class="fa-solid fa-door-open"></i> Logout</button>
        </form>
         </form>
    <a href="home.php"><button><i class="fa-solid fa-home"></i> Home</button></a>
    </div>
    <div id="chat-container">
        <div id="chat-box"></div>
        <div id="chat-input">
            <input type="text" id="message" placeholder="Type a message...">
            <button id="send">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleEditOptions() {
            const editOptions = document.getElementById('edit-options');
            editOptions.classList.toggle('show');
        }

        function fetchMessages() {
            $.ajax({
                url: 'fetch_messages.php',
                method: 'GET',
                success: function(data) {
                    $('#chat-box').html(data);
                }
            });
        }

        $(document).ready(function() {
            fetchMessages();
            setInterval(fetchMessages, 1000); // Fetch messages every second

            $('#send').on('click', function() {
                sendMessage();
            });

            // Function to send message
            function sendMessage() {
                const message = $('#message').val();
                if (message.trim() !== '') {
                    $.ajax({
                        url: 'send_message.php',
                        method: 'POST',
                        data: { message: message },
                        success: function() {
                            $('#message').val('');
                            fetchMessages();
                        }
                    });
                }
            }


    // Event listener for pressing Enter key
    $('#message').keypress(function(event) {
        if (event.which === 13) { // Check if Enter key is pressed
            sendMessage();
        }
    });
});

    </script>
</body>
</html>
