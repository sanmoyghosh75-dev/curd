<?php
include "db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$result = mysqli_query($conn,"SELECT * FROM names WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(!$data){
    die("Data not found");
}

if(isset($_POST['update'])){

    $name = $_POST['name'];

    mysqli_query($conn,"UPDATE names SET name='$name' WHERE id=$id");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Name</title>

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

    <h2>Edit Name</h2>

    <form method="POST">

        <div class="input-box">
            <i class="fa fa-user"></i>
            <input type="text"
                   name="name"
                   value="<?php echo htmlspecialchars($data['name']); ?>"
                   required>
        </div>

        <button type="submit" name="update">Update</button>

    </form>

</div>

</body>
</html>