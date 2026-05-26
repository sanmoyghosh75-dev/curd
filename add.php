<?php
include "db.php";

if(isset($_POST['add'])){

    $name = $_POST['name'];

    mysqli_query($conn,"INSERT INTO names(name) VALUES('$name')");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Name</title>

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

<!-- FORM BOX -->
<div class="container">

    <h2>Add Name</h2>

    <form method="POST">

        <div class="input-box">
            <i class="fa fa-user"></i>
            <input type="text" name="name" placeholder="Enter Name" required>
        </div>

        <button type="submit" name="add">Add</button>

    </form>

</div>

</body>
</html>