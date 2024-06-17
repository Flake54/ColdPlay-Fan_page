<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    if (!isset($_POST['privacy_policy'])) {
        $message[] = 'Please agree to the privacy policy.';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'User already exists!';
        } else {
            if ($pass != $cpass) {
                $message[] = 'Password not matched!';
            } else {
                // Generate a random verification code
                $verification_code = rand(100000, 999999);

                $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, verification_code) VALUES('$name', '$email', '$pass', '$image', '$verification_code')") or die('query failed');

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);

                    // Send verification code to user's email
                    $to = $email;
                    $subject = "Your Verification Code";
                    $message = "Your verification code is $verification_code";
                    $headers = "From: birnel54@gmail.com";
                    
                    mail($to, $subject, $message, $headers);

                    $_SESSION['user_id'] = mysqli_insert_id($conn);
                    $_SESSION['username'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['image'] = $image;
                    $_SESSION['verification_code'] = $verification_code;

                    header('location:login.php');
                } else {
                    $message[] = 'Registration failed!';
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Additional CSS for background image -->
    <style>
      body {
         background-image: url('./images/c13.jpg');
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
      }
   </style>
</head>
<body>
<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Register now</h3>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>
        <input type="text" name="name" placeholder="enter your name" class="box" required>
        <input type="email" name="email" placeholder="enter your email" class="box" required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
        <input type="file" name="image" class="box" required>
        <input type="checkbox" name="privacy_policy" id="privacy_policy" required>
        <label for="privacy_policy">I agree to the <a id='terms' href="privacy_policy.html" target="_blank">privacy policy</a></label>
        <input type="submit" name="submit" value="register now" class="btn">
        <p>already have an account? <a href="login.php">Login now</a></p>
    </form>
</div>
</body>
</html>
