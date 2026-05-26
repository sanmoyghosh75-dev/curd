<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM names");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/script.js" defer></script>
</head>

<body>

<!-- BACKGROUND VIDEO -->
<div class="bg-video">
  <video autoplay muted loop playsinline>
    <source src="video/video.mp4.mp4" type="video/mp4">
  </video>
</div>

<div class="container">

    <!-- TOP BAR -->
    <div class="topbar">
        <h2>Admin Dashboard</h2>
        <a href="logout.php">Logout</a>
    </div>

    <!-- USER INFO -->
    <h3 style="color:#fff; text-align:center;">
        Welcome, <?php echo $_SESSION['user']; ?>
    </h3>

    <br>

    <a href="add.php">+ Add Name</a>

    <br><br>

    <!-- TABLE -->
    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <tr>

            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>

            <td>

                <a href="edit.php?id=<?php echo $row['id']; ?>">
                    Edit
                </a>

                <a href="javascript:void(0);"
                   onclick="confirmDelete(<?php echo $row['id']; ?>)">
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>