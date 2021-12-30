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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                            <input type = "text" name ="" id="login"
                            class="form-control" placeholder="Login">
                        </div>
                        <div class = "form-group">
                            <label>Email</label>
                            <input type = "text" name ="" id="email"
                                   class="form-control" placeholder="Email">
                        </div>
                        <div class = "form-group">
                            <label>Password</label>
                            <input type = "text" name ="" id="password"
                                   class="form-control" placeholder="Password">
                        </div>
                        <div class = "form-group">
                            <label>Registration date</label>
                            <input type = "text" name ="" id="reg_date"
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
        <div id = "users_tab">
        <?php

        echo ' <table ><tr>
                    <th>id</th>
                    <th>login</th>
                    <th>mail</th>
                    <th>registration</th>
                    <th>delete</th>
                    <th>update</th>
                    </tr>';

        /** @var Review $rev */
        foreach ($db->getUsersData() as $user) {


            echo '<tr>';
            echo '<td > ' . $user->getId() . '</td>';
            echo '<td > ' . $user->getLogin() . '</td>';
            echo '<td >  ' . $user->getMail() . '</td>';
            echo '<td > ' . $user->getRegistrationDate() . '</td>';
        ?>


            <td><button href="?delete=<?=$user->getID()?>" class="btn btn-warning del" name ="<?=$user->getID()?>" onclick="DeleteUser('<?=$user->getID()?>')">
                Delete
                </button> </td>
        <td><button href="?delete=<?=$user->getID()?>" class="btn btn-warning del" name ="<?=$user->getID()?>" >
                Update
            </button></td>

            <?php





            echo '</tr>';

        }
        echo '</table>';
        ?>
        </div>
</selection>
<button onclick="topFunction()" id="myBtn" >
    <i class = "material-icons">arrow_upward</i>
</button>
<script src="btn.js"></script>
<script type="text/javascript">
    function readUsers() {
        var readUsers = "readUsers";
        $.ajax({
            url: "backend1.php",
            method: "POST",
            data: {
                readUsers: readUsers
            },
            success:function (data,status) {
                $('#users_tab').html(data);
            }
        });
    }
    function addUserAdmin() {
        var login = $('#login').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var reg_date = $('#reg_date').val();
        $.ajax({
            url: "backend1.php",
            method: "POST",
            data: {
                login : login,
                email : email,
                password: password,
                reg_date: reg_date
            },
            success:function (data,status) {
                readUsers();
            }
        });
        //console.log(login);
    }
</script>
</body>
</html>