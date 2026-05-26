<?php
include "db.php";

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = intval($_GET['id']);

    $sql = "DELETE FROM names WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: dashboard.php");
        exit();
    }else{
        echo "Delete failed!";
    }

}else{
    echo "No ID found!";
}
?>