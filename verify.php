<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

if (isset($_POST['verify'])) {
    $recaptcha_secret = "6Leo_vApAAAAAL6HUNvOWZT-sgkqllLj65i4Oqnb";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $response_keys = json_decode($response, true);

    if ($response_keys["success"]) {
        $_SESSION['user_verified'] = true;
        header('location:home.php');
    } else {
        $message[] = 'CAPTCHA verification failed!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Verify</h3>
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <div class="g-recaptcha" data-sitekey="6Leo_vApAAAAAOd-9HmphJG0JAQx_As3HJ5nIPV0"></div>
      <input type="submit" name="verify" value="Verify Now" class="btn">
   </form>
</div>
</body>
</html>


