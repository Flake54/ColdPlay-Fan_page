<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['image'] = $row['image'];
        
        // Generate a random verification code
        $verification_code = rand(100000, 999999);
        $_SESSION['verification_code'] = $verification_code;
        
        // Store the verification code in the database
        $update = mysqli_query($conn, "UPDATE `user_form` SET verification_code = '$verification_code' WHERE id = '".$_SESSION['user_id']."'") or die('query failed');
        
        // Send verification code to user's email
        $to = $email;
        $subject = "Your Verification Code";
        $message = "Your verification code is $verification_code";
        $headers = "From: birnel54@gmail.com";
        
        mail($to, $subject, $message, $headers);

        // Redirect to verification page
        header('location:verify.php');
    } else {
        $message[] = 'incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   
   <!-- Additional CSS for background image -->

</head>
<body>
<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Login Now</h3>
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Enter Email" class="box" required>
      <input type="password" name="password" placeholder="Enter Password" class="box" required>
      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>Don't have an account? <a href="register.php">Register Now</a></p>
   </form>
</div>
</body>
</html>
