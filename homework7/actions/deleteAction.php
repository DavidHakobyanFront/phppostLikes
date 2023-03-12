<?php
include "../config/connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE id = $id";
global $connect;
$result = mysqli_query($connect, $sql);
if ($result){
    header('Location: ../index.php');
}
else {
    echo "Failed:  "  . mysqli_error($connect);
}