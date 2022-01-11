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

</head>
<body>
<?php
include("php_files/header_navbar.php");
?>
<script>


</script>

<h1 class="container h1_title"> Users Table </h1>

<div>

    <div class="container">
        <?php
        if (isset($_SESSION['logged_user'])) {
            if ($_SESSION['logged_user']->getLogin() != "admin") {
                echo "<script>location.href = 'index.php';</script>";
            }

        } else {
            echo "<script>location.href = 'index.php';</script>";
        }
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary margin_bottom" data-toggle="modal" data-target="#exampleModal">
           Add User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class = "form-group">
                            <label>Login</label>
                            <input type = "text" maxlength=30 id="login"
                                    class="form-control" placeholder="Login">
                        </div>
                        <div class = "form-group">
                            <label>Email</label>
                            <input type = "text" maxlength=30 id="email"
                                   class="form-control" placeholder="Email">
                        </div>
                        <div class = "form-group">
                            <label>Password</label>
                            <input type = "text" maxlength=20 id="password"
                                   class="form-control" placeholder="Password">
                        </div>
                        <div class = "form-group">
                            <label>Registration date</label>
                            <input type = "text" maxlength=10 id="reg_date"
                                   class="form-control" placeholder="Registration date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addUserAdmin()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class = "form-group">
                            <label>Login</label>
                            <input type = "text" maxlength=30 id="upd_login"
                                   class="form-control" placeholder="Login">
                        </div>
                        <div class = "form-group">
                            <label>E-mail</label>
                            <input type = "text" maxlength=30 id="upd_email"
                                   class="form-control" placeholder="Email">
                        </div>
                        <div class = "form-group">
                            <label>Registration date</label>
                            <input type = "text" maxlength=10 id="upd_reg_date"
                                   class="form-control" placeholder="Registration date">
                        </div>
                        <input type="hidden" id="hidden_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="UpdateUser()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div id = "users_tab">

        </div>
</div>
<button onclick="topFunction()" id="myBtn" >
    <i class = "material-icons">arrow_upward</i>
</button>
<script src="btn.js"></script>
<script>
    $(document).ready(function (){
        readUsers();
    });

</script>
</div>
</body>
</html>