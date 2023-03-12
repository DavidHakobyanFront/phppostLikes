<?php
session_start();
require_once '../config/connect.php';


function clear_data($val)
{
    $val = trim($val);
    $val = stripcslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}


$full_name = clear_data($_POST['full_name']);
$login = clear_data($_POST['login']);
$email = clear_data($_POST['email']);
$password = clear_data($_POST['password']);
$password_confirm = clear_data($_POST['password_confirm']);

$_SESSION['user']['full_name'] = $full_name;
$_SESSION['user']['login'] = $login;
$_SESSION['user']['email'] = $email;
$_SESSION['user']['password'] = $password;
$_SESSION['user']['password_confirm'] = $password_confirm;

// $pattern_full_name = '/(^[A-Za-z]{3,16})([ ]{0,1})([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})/';
$err = [];
$hasError = 0;

if (!$full_name) {
    $hasError =  1;
    $_SESSION['error']['full_name'] = '<small class="text-danger">Դատարկ է Ամբողջական անունը</small>';
}
if (!$login) {
    $hasError =  1;
    $_SESSION['error']['login'] = '<small class="text-danger">Դատարկ է login</small>';
}
if (!$email) {
    $hasError =  1;

    $_SESSION['error']['email'] = '<small class="text-danger">Դատարկ է email</small>';
}

// unique mail


if ($password && $password_confirm) {
    if ($password === $password_confirm) {

        $password = md5($password);
    } else {
        $hasError = 1;
        $_SESSION['error']['password'] = 'Գաղտնաբառը չի հաստատվում';
    }
} else {
    $hasError = 1;
    $_SESSION['error']['password'] = 'Գաղտնաբառը դատարկ է';
}
if (!isset($conn)){
    echo "not correct";
}
global $connect;
$resultlogin = mysqli_query($connect,"SELECT * FROM `users` WHERE login = '$login' LIMIT 1");
$presentlogin = mysqli_num_rows($resultlogin);
if ($presentlogin>0){
    $hasError = 1;
    $_SESSION['error']['login'] = 'Այդ login-ով արդեն գրանցում կա, նշել այլ login';
}
$result = mysqli_query($connect,"SELECT * FROM `users` WHERE email = '$email' LIMIT 1");
$present = mysqli_num_rows($result);
if ($present>0){
    $hasError = 1;
    $_SESSION['error']['email'] = 'Այդ email-ով արդեն գրանցում կա, նշել այլ email';
}

// upload image

$target_dir = "../uploads/";
$target_file = $target_dir . time() . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
}

$id = $_GET['id'];
if($hasError == 0){
    mysqli_query($connect, "UPDATE `users` SET `full_name`='$full_name',`login`='$login',`email`='$email',`password`='$password',`avatar`='$target_file' WHERE id = $id");
    $_SESSION['message'] = 'Գրանցումը հաջող կատարվել է';
    header('Location: ../index.php');
} else {
    header('Location: ../pages/register.php');
}

?>