<?php
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

</head>
<body>
<?php
include("php_files/header_navbar.php");
?>

<h1 class="container h1_title"> Add Post</h1>

<selection>
    <div class="container">
    <form method="post">
        <div class="form-group">

            <label for="name">Name:</label>
            <input type="text" class="form-control" maxlength="30" id="name" name="name" aria-describedby="name" placeholder="Add name" ><br>
            <label for="mail">Mail:</label>
            <input type="email" class="form-control" maxlength="30" name="mail" id="add_review_email"  placeholder="Add mail"><br>
            <label for="rating">Rating:</label>
            <input type="number"  class="form-control" min="0" max="10" name="rating" ><br>
            <label for="comment">Comment:</label>
            <input type="text" class="form-control"  name="comment" aria-describedby="comment" placeholder="Add text"><br>

        </div>
        <input type="submit" class="btn btn-success" name="add_review" value="Odoslat" onclick="AddReview()"><br>

    </form>
    </div>
</selection>

</body>
</html>

