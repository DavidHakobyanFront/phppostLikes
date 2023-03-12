<?php
require_once '../config/connect.php';

$user_id = json_decode($_POST['user_id']);
$post_id = json_decode($_POST['post_id']);

var_dump($user_id);
header("Content-Type: application/json; charset=UTF-8");
$data = json_decode(file_get_contents("php://input"));
echo "Сервер получил следующие данные:  $data->user_id,  $data->post_id";
global $connect;
mysqli_query($connect, "INSERT INTO `likes`(`user_id`, `post_id`) VALUES ('$user_id', '$post_id')");


