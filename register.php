<?php
include "db.php";

$message = "";

if(isset($_POST['register'])){

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];
    $cpass = $_POST['confirm_password'];

    // Password check
    if($pass != $cpass){

        $message = "Passwords do not match!";

    }

    // Email validation
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $message = "Invalid Email!";

    }

    else{

        // Check duplicate email
        $check = $conn->prepare("SELECT id FROM users WHERE email=?");

        $check->bind_param("s", $email);

        $check->execute();

        $result = $check->get_result();

        if($result->num_rows > 0){

            $message = "Email already exists!";

        } else {

            // Password hash
            $password = password_hash($pass, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $conn->prepare(
                "INSERT INTO users(name,email,password)
                 VALUES(?,?,?)"
            );

            $stmt->bind_param("sss", $name, $email, $password);

            if($stmt->execute()){

                header("Location: login.php");
                exit();

            } else {

                $message = "Registration Failed!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<!-- Background Video -->
<div class="bg-video">
    <video autoplay muted loop playsinline>
       <source src="video/video.mp4.mp4" type="video/mp4">
    </video>
</div>

<!-- Register Box -->
<div class="container">

    <h2>Register</h2>

    <!-- Message -->
    <?php
    if($message != ""){
        echo "<p class='msg'>$message</p>";
    }
    ?>

    <form method="POST">

        <!-- Name -->
        <div class="input-box">

            <i class="fa fa-user"></i>

            <input type="text"
                   name="name"
                   placeholder="Enter Name"
                   required>

        </div>

        <!-- Email -->
        <div class="input-box">

            <i class="fa fa-envelope"></i>

            <input type="email"
                   name="email"
                   placeholder="Enter Email"
                   required>

        </div>

        <!-- Password -->
        <div class="input-box">

            <i class="fa fa-lock"></i>

            <input type="password"
                   id="reg_pass"
                   name="password"
                   placeholder="Enter Password"
                   required>

            <span class="eye fa fa-eye"
                  onclick="togglePassword('reg_pass', this)">
            </span>

        </div>



        <!-- Confirm Password -->
        <div class="input-box">

            <i class="fa fa-key"></i>

            <input type="password"
                   id="reg_cpass"
                   name="confirm_password"
                   placeholder="Confirm Password"
                   required>

            <span class="eye fa fa-eye"
                  onclick="togglePassword('reg_cpass', this)">
            </span>

        </div>

        <!-- Button -->
        <button type="submit" name="register">
            Register
        </button>

    </form>

    <p>
        Already have account?
        <a href="login.php">Login</a>
    </p>

</div>

<!-- JS -->
<script src="js/script.js"></script>

</body>
</html>