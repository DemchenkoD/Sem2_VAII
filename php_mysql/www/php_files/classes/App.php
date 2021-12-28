<?php
require_once "DBStorage.php";

class App
{
private DBStorage $storage;

public function __construct()
{
    $this->storage = new DBStorage();
    if (isset($_POST['add_review'])) {
        $prejslo = $this->storage->addReview(new Review(null,$_POST['name'], $_POST['mail'], $_POST['rating'], $_POST['comment'],0,0));
        if ($prejslo) {
            echo "<script type='text/javascript'>location.href = 'reviews.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Wrong Input Data or Email already been used to create review')</script>";
        }
        //echo "<script type='text/javascript'>funErrorBadInput();</script>"; NOT WORKING
    }
    if (isset($_GET['like'])) {
        $this->storage->addLike($_GET['like']);
    }
    if (isset($_GET['dislike'])) {
        $this->storage->addDislike($_GET['dislike']);

    }
    if (isset($_GET['delete'])) {
        $this->storage->DeleteReview($_GET['delete']);

    }
    if (isset($_POST['signup'])) {
        $data = $_POST;
        $errors = array();
        if (trim($data['login_inp']) == '') {
            $errors[] = 'Login is empty';
        }
        if (trim($data['email_inp']) == '') {
            $errors[] = 'E-mail is empty';
        }
        if (trim($data['password_inp']) == '') {
            $errors[] = 'Password is empty';
        }
        if ($data['password_inp'] != $data['password2_inp'])  {
            $errors[] = 'Passwords did not match';
        }
        $passwd_hash = password_hash($data['password_inp'], PASSWORD_DEFAULT);
        if (empty($errors) ) {
            $prejslo = $this->storage->registrateUser(new User(null, $data['login_inp'], $data['email_inp'], $passwd_hash, date("d.m.Y")));
            if ($prejslo) {
                echo "<script type='text/javascript'>alert('Registracia prejsla uspesne, teraz mozete sa prihlasit')</script>";
            } else {
                echo "<script type='text/javascript'>alert('Doslo k chybe')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert(' " .array_shift($errors). "' )</script>";
        }

    }
    if (isset($_POST['login'])) {
        $data = $_POST;
        $user = $this->storage->getUser($data['login_inp']);
        if ($user != null) {
            if (password_verify($data['password_inp'], $user->getPassword())) {
                $_SESSION['logged_user'] = $user;
            } else {
                echo "<script type='text/javascript'>alert('Wrong password')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('User with such login not found')</script>";
        }
    }
    if (isset($_POST['logout'])) {
        unset($_SESSION['logged_user']);
    }
}
}