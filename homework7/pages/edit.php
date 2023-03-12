<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Document</title>
</head>

<body>
<div class="container">
    <?php
    include ('../config/connect.php');
    include('../layouts/header.php')
    ?>
    <form action="../actions/editAction.php" method="post" enctype="multipart/form-data">
        <h3>Edit User Information</h3>
<?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
        global $connect;
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_accos($result)){
            ?>
        <label>Ամբողջական անուն, ազգանուն</label>
        <input type="text" name="full_name"  value="<?php echo $row['full_name']?>">
        <?php
        if ($_SESSION['error']['full_name']) {
            echo '<p class="validation">' . $_SESSION['error']['full_name'] . '</p>';
        }
        unset($_SESSION['error']['full_name']);
        ?>
        <label>Լոգին</label>
        <input type="text" name="login" value="<?php echo $row['login']?>">
        <?php
        if ($_SESSION['error']['login']) {
            echo '<p class="validation">' . $_SESSION['error']['login'] . '</p>';
        }
        unset($_SESSION['error']['login']);
        ?>
        <label>Մեյլ</label>
        <input type="email" name="email" value="<?php echo $row['email']?>">
        <?php
        if ($_SESSION['error']['email']) {
            echo '<p class="validation">' . $_SESSION['error']['email'] . '</p>';
        }
        unset($_SESSION['error']['email']);
        ?>
        <label>Պրոֆիլի նկար</label>
        <input type="file" name="avatar">
        <label>Գաղտնաբառ</label>
        <input type="password" name="password"  value="<?php echo $row['password']?>">
        <label>Գաղտնաբառի հաստատում</label>
        <input type="password" name="password_confirm" value="<?php echo $row['password_confirm']?>">
        <button>Պահպանել</button>
        <p style="display: flex; justify-content: center">
            <a href="/index.php">Cancel</a>
        </p>


        <?php
        if ($_SESSION['error']['password']) {
            echo '<p class="message">' . $_SESSION['error']['password'] . '</p>';
        }
        unset($_SESSION['error']['password']);
        ?>

       <?php }

   ?>

    </form>
    <?php
    include('../layouts/footer.php')
    ?>
</div>
</body>

</html>