<?php
require "php_files/classes/DBStorage.php";

$db = new DBStorage();

require "php_files/classes/App.php";

$app = new App();

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <?php
    include("php_files/header_links.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<?php
include("php_files/header_navbar.php");
?>

<h1 class="container h1_title"> Reviews: </h1>

<div>

    <div class="container">
        <?php if(isset($_SESSION['logged_user'])) : ?>
            <a class="btn btn-success margin_bottom" href="add_review.php" role="button">Add review</a>
        <?php else : ?>
            <div>You need to log in to add review</div>
        <?php endif; ?>

        <?php

        /** @var Review $rev */
        foreach ($db->getReviewsData() as $rev) {

            echo '<div class = "alert alert-info mt-2">';
            echo '<h3 >' . $rev->getAuthor() . '</h3>';
            echo '<h4 > Rating: ' . $rev->getRating() . '</h4>';
            echo '<h5 id="reviews_mails"> Mail: ' . $rev->getMail() . '</h5>';
            echo '<p>' . $rev->getComment() . '</p>';
            //echo '<p> ID ' . $rev->getId() . '</p>';
            $likes = $rev->getLikes();
            $dislikes = $rev->getDislikes();
            echo '<div class="test-end">';
        ?>
            <a href="?like=<?=$rev->getID()?>" class="btn btn-primary">
            <?= $rev->getLikes();?>
            <i class ="bi bi-hand-thumbs-up"></i>
            </a>
            <a href="?dislike=<?=$rev->getID()?>" class="btn btn-primary">
                <?= $rev->getDislikes();?>
                <i class ="bi bi-hand-thumbs-down"></i>
            </a>
            <?php if(isset($_SESSION['logged_user'])) : ?>
                    <?php if($_SESSION['logged_user']->getLogin() == $rev->getAuthor() ||
                                $_SESSION['logged_user']->getLogin() == "admin") : ?>
                        <a href="?delete=<?=$rev->getID()?>" class="btn btn-warning">Delete</a>
                    <?php endif; ?>
            <?php endif; ?>


        <?php
            echo '</div>';
            echo '</div>';
        }
        ?>

</div>
<button onclick="topFunction()" id="myBtn" >
    <i class = "material-icons">arrow_upward</i>
</button>
<script src="btn.js"></script>
</div>
</div>
</body>
</html>
