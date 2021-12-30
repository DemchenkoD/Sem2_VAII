<?php
require "php_files/classes/DBStorage.php";

$db = new DBStorage();
$data = $_POST;

if (isset($_POST['readUsers'])) {
    $data = ' <table ><tr>
                    <th>id</th>
                    <th>login</th>
                    <th>mail</th>
                    <th>registration</th>
                    <th>delete</th>
                    <th>update</th>
                    </tr>';

foreach ($db->getUsersData() as $user) {


    $data .= '<tr>
<td > '. $user->getId() .'</td>
<td > '. $user->getLogin() .'</td>
<td >  '. $user->getMail() .'</td>
<td > '. $user->getRegistrationDate() .'</td>
<td><button href="?delete='.$user->getID().'" class="btn btn-warning del" name ="'.$user->getID().' onclick="DeleteUser('. $user->getID().')">
                Delete
                </button> </td>
<td><button href="?delete='.$user->getID().'" class="btn btn-warning del" name ="'.$user->getID().' onclick="DeleteUser('. $user->getID().')">
                Update
                </button> </td> </tr>
';

}
    $data .= "</table>";
echo $data;
}


if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['reg_date'])){

    $passwd_hash = password_hash($data['password_inp'], PASSWORD_DEFAULT);

    $prejslo = $db->registrateUser(new User(null, $data['login'], $data['email'], $passwd_hash, $data['reg_date']));
    if ($prejslo) {
        //echo "<script type='text/javascript'>alert('Registracia prejsla uspesne, teraz mozete sa prihlasit')</script>";
    } else {
       // echo "<script type='text/javascript'>alert('Doslo k chybe')</script>";
    }

}
//echo "<script type='text/javascript'>alert('Doslo k chybe')</script>";
?>