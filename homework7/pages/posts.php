<?php
session_start();
require_once '../config/connect.php';
require_once '../actions/postsAction.php';

$posts = get_posts();
$user_id = $_SESSION['user']['id'];
$post_id = $posts['id'];
global $connect;



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Posts</title>
</head>

<body>
    <div class="postscontainer">
        <?php
        include('../layouts/header.php')
        ?>
        <form class="postform" action="../actions/postsAction.php" method="post">

            <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
                <div> POSTS</div>

                <div class="container d-flex justify-content-center">
                    <form action="../actions/postsAction.php" method="post" style="width: 50vw; min-width: 300px;">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">title</label>
                                <input type="text" class="form-control" name="title" placeholder="title">
                            </div>
                            <div class="col">
                                <label class="form-label">description</label>
                                <input type="text" class="form-control" name="description" placeholder="description">
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">Save</button>
                        </div>
                    </form>
                </div>
                <table class="table table-hover text-center mb-3">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col" colspan="2">User</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $posts = get_posts();
                        ?>
                        <?php foreach ($posts as $post) : ?>
                            <!-- <?php
                            echo mysqli_query($connect, "SELECT COUNT (*) FROM `likes` WHERE id = $post_id");
                            ?> -->
                            <tr>
                                <td><?= $post['title'] ?>
                                <td><?= $post['description'] ?>
                                <td><img style="width: 100px" src="<?= $post['avatar'] ?>" />
                                <td><?= $post['full_name'] ?>
                                <td>
                                    <p><?= mysqli_query($connect, "SELECT COUNT (*) FROM `likes` WHERE id = $post_id"); ?></p>
                                    <input id="like_button" type="checkbox" name="likebutton" onchange="setLike(<?= $post['user_id'] ?>,<?= $post['id'] ?>)" />
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </nav>
            <?php
            include('../layouts/footer.php')
            ?>

        </form>
    </div>
    <script src="../assets/js/setLike.js"></script>
</body>

</html>