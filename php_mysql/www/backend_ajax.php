<?php
require "php_files/classes/DBStorage.php";
$db = new DBStorage();
$data = $_POST;

if (isset($_POST['readUsers'])) {

    $data = ' <table ><tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Registration date</th>
                    <th>Delete</th>
                    <th>Update</th>
                    </tr>';

foreach ($db->getUsersData() as $user) {

    $data .= '<tr>
<td > '. $user->getId() .'</td>
<td > '. $user->getLogin() .'</td>
<td >  '. $user->getMail() .'</td>
<td > '. $user->getRegistrationDate() .'</td>
<td><button href="?delete='.$user->getID().'" class="btn btn-warning del"  name ="'.$user->getID().'" onclick="DeleteUser('.$user->getID().')">
    Delete
</button> </td>
<td><button href="?delete='.$user->getID().'" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" name ="'.$user->getID().'" onclick="getUserDetails_UpdModal('.$user->getID().')">
    Update
</button> </td> </tr>';

}
    $data .= "</table>";
echo $data;
}
if (isset($_POST['readOffices'])) {

    $data = ' <table >';

    foreach ($db->getOfficesData() as $office) {

        $data .= '<tr>
<td >
                <div class="row">
                    <h5 class="col h4_contacts"> Address:</h5>
                    <div class="col"> '.$office->getCountry().', '.$office->getCity().', '.$office->getAddress().'</div>
                </div>
                <div class="row">
                    <h5 class="col h4_contacts"> Phone number:</h5>
                    <div class="col"> '.$office->getPhoneNumber().'</div>
                </div>
                <div class="row">
                    <h5 class="col h4_contacts"> Working hours:</h5>
                    <div class="col"> '.$office->getWorkingHours().'</div>
                </div>
    </td>
 </tr>';

    }
    $data .= "</table>";
    echo $data;
}

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['reg_date'])){

    $passwd_hash = password_hash($data['password'], PASSWORD_DEFAULT);
    $result = $db->registrateUser(new User(null, $data['login'], $data['email'], $passwd_hash, $data['reg_date']));
    echo $result;

}
if (isset($_POST['deleteid'])){
    $db->DeleteUser($_POST['deleteid']);
}

if (isset($_POST['id'])){
    $user = $db->getUserById($_POST['id']);
    echo json_encode($user);
}

if (isset($_POST['upd_login']) && isset($_POST['upd_email']) && isset($_POST['upd_reg_date'])){

    $res = $db->updateUser(new User($data['upd_id'], $data['upd_login'], $data['upd_email'], null, $data['upd_reg_date']));


}
if (isset($_POST['add_employee'])) {
    $result = $db->addEmploee($_POST['name1'], $_POST['description1'], $_POST['photo_path1'],
        $_POST['name2'], $_POST['description2'], $_POST['photo_path2'],
        $_POST['name3'], $_POST['description3'], $_POST['photo_path3'],
        $_POST['name4'], $_POST['description4'], $_POST['photo_path4']);

}

if (isset($_POST['add_office'])) {
    $result = $db->addOffice($_POST['country'], $_POST['city'], $_POST['address'],
        $_POST['phone_number'], $_POST['working_hours']);

}
?>

