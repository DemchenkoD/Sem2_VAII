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
<script>
    function DeleteUser(deleteid) {

        console.log(deleteid);
    }

</script>

<h1 class="container h1_title"> BLOG </h1>

<selection>

    <div class="container">
        <?php if($_SESSION['logged_user']->getLogin() == "admin") : ?>

        <?php else :
            echo "<script type='text/javascript'>location.href = 'index.php';</script>";
        endif; ?>

        <?php

        /** @var Review $rev */
        foreach ($db->getUsersData() as $user) {

            echo '<div class = "alert alert-info mt-2" style="">';
            echo '<h3 > ID : ' . $user->getId() . '</h3>';
            echo '<h3 > Login : ' . $user->getLogin() . '</h3>';
            echo '<h4 > Mail : ' . $user->getMail() . '</h4>';
            echo '<h5 > Registartion date: ' . $user->getRegistrationDate() . '</h5>';

            echo '<div class="test-end">';
        ?>

            <button href="?delete=<?=$user->getID()?>" class="btn btn-warning del" name ="<?=$user->getID()?>" onclick="DeleteUser('<?=$user->getID()?>')">
                Delete
            </button>
            <button href="?delete=<?=$user->getID()?>" class="btn btn-warning del" name ="<?=$user->getID()?>" >
                Update
            </button>

        <?php
            echo '</div>';
            echo '</div>';
        }
        ?>

</selection>
<button onclick="topFunction()" id="myBtn" >
    <i class = "material-icons">arrow_upward</i>
</button>
<script src="btn.js"></script>
</body>
</html>
