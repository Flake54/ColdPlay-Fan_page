<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    if (!empty($image)) {
        move_uploaded_file($image_tmp_name, $image_folder);
        $update = mysqli_query($conn, "UPDATE `user_form` SET name='$name', image='$image' WHERE id='$user_id'") or die('query failed');
        if ($update) {
            $_SESSION['username'] = $name;
            $_SESSION['image'] = $image;
            $message[] = 'Profile updated successfully!';
        } else {
            $message[] = 'Profile update failed!';
        }
    } else {
        $update = mysqli_query($conn, "UPDATE `user_form` SET name='$name' WHERE id='$user_id'") or die('query failed');
        if ($update) {
            $_SESSION['username'] = $name;
            $message[] = 'Profile updated successfully!';
        } else {
            $message[] = 'Profile update failed!';
        }
    }
}

$query = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id='$user_id'") or die('query failed');
if (mysqli_num_rows($query) > 0) {
    $fetch = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Edit Profile</h3>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>
        <input type="text" name="name" value="<?php echo $fetch['name']; ?>" class="box" required>
        <input type="file" name="image" class="box">
        <img src="uploaded_img/<?php echo $fetch['image']; ?>" alt="Profile Image" width="100">
        <input type="submit" name="update_profile" value="Update Profile" class="btn">
        <a href="logout.php" class="btn">Logout</a>
    </form>
</div>
</body>
</html>
