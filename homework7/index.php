<?php
session_start();

if(empty($_SESSION['user'])){
    header('Location: ./pages/login.php');
    $id = $_GET('id');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>

<body style="display: flex; justify-content: center; align-items: center">
    <form method="post">
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
       <button><a href="../pages/posts.php">POSTs</a></button>
        <!--        <label>Ամբողջական անուն, ազգանուն</label>-->
        <!--        <input type="text" name="title" placeholder="Մուտքագրեք ձեր title" value="--><?php //= empty($_SESSION['user']['titl']) ? '' : $_SESSION['user']['title'] 
                                                                                                   ?><!--">-->
       <div style="height: 30px; background-color: #000000; display: flex; justify-content: space-around; align-items: center">
        <a href="../pages/edit.php" >Edit</a>
        <a href="../actions/deleteActions.php" >Delete</a>
        <a href="../actions/logoutAction.php" class="logout">Logout</a>
       </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


</body>

</html>