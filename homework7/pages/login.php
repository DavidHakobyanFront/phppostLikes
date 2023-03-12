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
include('../layouts/header.php')
?>
<form action="../actions/signinAction.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/pages/register.php">Зарегистрируйтесь</a>!
        </p>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="message">' . $_SESSION['message'] . '</p>';
        }
        unset ($_SESSION['message']);
        ?>
    </form>


<?php
include('../layouts/footer.php')
?>
</div>
</body>

</html>