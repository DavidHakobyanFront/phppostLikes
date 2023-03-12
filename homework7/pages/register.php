<?php
session_start()
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
    <form action="../actions/signupAction.php" method="post" enctype="multipart/form-data">
        <label>Ամբողջական անուն, ազգանուն</label>
        <input type="text" name="full_name" placeholder="Մուտքագրեք ձեր լրիվ անունը" value="<?= empty($_SESSION['user']['full_name']) ? '' : $_SESSION['user']['full_name'] ?>">
        <?php
        if ($_SESSION['error']['full_name']) {
            echo '<p class="validation">' . $_SESSION['error']['full_name'] . '</p>';
        }
        unset($_SESSION['error']['full_name']);
        ?>
        <label>Լոգին</label>
        <input type="text" name="login" placeholder="Մուտքագրեք ձեր նիկնեյմը" value="<?= empty($_SESSION['user']['login']) ? '' : $_SESSION['user']['login'] ?>">
        <?php
        if ($_SESSION['error']['login']) {
            echo '<p class="validation">' . $_SESSION['error']['login'] . '</p>';
        }
        unset($_SESSION['error']['login']);
        ?>
        <label>Մեյլ</label>
        <input type="email" name="email" placeholder="Մուտքագրեք ձեր փոստային հասցեն" value="<?= empty($_SESSION['user']['email']) ? '' : $_SESSION['user']['email'] ?>">
        <?php
        if ($_SESSION['error']['email']) {
            echo '<p class="validation">' . $_SESSION['error']['email'] . '</p>';
        }
        unset($_SESSION['error']['email']);
        ?>
        <label>Պրոֆիլի նկար</label>
        <input type="file" name="avatar">
        <label>Գաղտնաբառ</label>
        <input type="password" name="password" placeholder="Մուտքագրեք գաղտնաբառը" >
        <label>Գաղտնաբառի հաստատում</label>
        <input type="password" name="password_confirm" placeholder="Հաստատեք գաղտնաբառը" >
        <button>Մուտք գործել</button>
        <p>
            Դուք արդեն ունեք հաշիվ? - <a href="/index.php">Մուտք գործել</a>!
        </p>


        <?php
        if ($_SESSION['error']['password']) {
            echo '<p class="message">' . $_SESSION['error']['password'] . '</p>';
        }
        unset($_SESSION['error']['password']);
        ?>

    </form>
    <?php
        include('../layouts/footer.php')
    ?>
</div>
</body>

</html>