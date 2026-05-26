<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_assoc($res);

    if($row && password_verify($pass,$row['password'])){

        $_SESSION['user'] = $row['name'];
        header("Location: dashboard.php");
        exit();

    }else{
        $error = "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<!-- BACKGROUND VIDEO -->
<div class="bg-video">
    <video autoplay muted loop playsinline>
        <source src="video/video.mp4.mp4" type="video/mp4">
    </video>
</div>

<!-- LOGIN BOX -->
<div class="container">

    <h2>Login</h2>

    <?php if(isset($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>

    <form method="POST">

        <div class="input-box">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="input-box">
            <i class="fa fa-lock"></i>

            <input type="password" id="login_pass" name="password" placeholder="Enter Password" required>

            <span class="eye fa fa-eye"
            onclick="togglePassword('login_pass', this)"></span>
        </div>

        <button type="submit" name="login">Login</button>

    </form>

    <p>Don't have account? <a href="register.php">Register</a></p>

</div>

<script src="js/script.js"></script>

</body>
</html>