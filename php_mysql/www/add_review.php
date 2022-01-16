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

<div>
    <div class="container">
    <form method="post">
        <div class="form-group">


            <?php if(isset($_SESSION['logged_user'])) : ?>
                <label>Name:</label>
                <input type="text" class="form-control" maxlength="30"  name="name" value = "<?php echo $_SESSION['logged_user']->getLogin(); ?>" readonly="readonly"><br>
                <label >Mail:</label>
                <input type="email" class="form-control" maxlength="30" name="mail" id="add_review_email"  value = "<?php echo $_SESSION['logged_user']->getMail(); ?>" readonly="readonly"><br>

            <?php else : ?>
                <label>Name:</label>
                <input type="text" class="form-control" maxlength="30" name="name" placeholder="Add name" ><br>
                <label >Mail:</label>
                <input type="email" class="form-control" maxlength="30" name="mail" id="add_review_email"  placeholder="Add mail"><br>

            <?php endif; ?>
            <label>Rating:</label>
            <input type="number"  class="form-control" min="0" max="10" name="rating" ><br>
            <label>Comment:</label>
            <input type="text" class="form-control"  name="comment" placeholder="Add text"><br>

        </div>
        <input type="submit" class="btn btn-success" name="add_review" value="Add" ><br>

    </form>
    </div>
</div>

</body>
</html>

