<?php
session_start();
require_once '../config/connect.php';



if (isset($_POST['submit'])){
//    $id = mysqli_query($connect,"SELECT id FROM posts WHERE id = {$_GET['id']}");
    $title = $_POST['title'];
    $description = $_POST['description'];
//    $_SESSION['post']['id'] = $id;
    $_SESSION['post']['title'] = $title;
    $_SESSION['post']['description'] = $description;
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `posts`(`title`, `description`, `user_id`) VALUES ('$title','$description','$user_id')";
    $result = mysqli_query($connect, $sql);
    if ($result){
        header('Location: ../pages/posts.php');
    } else {
        echo "Failed";
    }
}

function get_posts() {
   global $connect;
   $sql = "SELECT * FROM `users` RIGHT JOIN `posts` ON posts.user_id = users.id";
   $result = mysqli_query($connect, $sql);
   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
   return $posts;
}