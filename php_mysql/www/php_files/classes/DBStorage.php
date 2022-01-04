<?php
require_once "Employee.php";
require_once "Review.php";
require_once "User.php";
require_once "Office.php";
class DBStorage
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'dtb456', 'db1');
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function getEmployeesData() {

        $result = [];
        $sql = "SELECT * FROM employees";
        $dbResult = $this->db->query($sql);
         if ($dbResult->num_rows > 0){
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new Employee($record['id'], $record['name'], $record['description'], $record['photo_path']);

            }

        }
        return $result;
    }
    public function getReviewsData(): array
    {

        $result = [];
        $sql = "SELECT * FROM reviews ORDER BY id DESC";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0){
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new Review($record['id'], $record['author'], $record['mail'], $record['rating'], $record['comment'], $record['likes'], $record['dislikes']);

            }

        }
        return $result;
    }
    public function getUsersData(): array
    {
        $result = [];
        $sql = "SELECT * FROM users ORDER BY id";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0){
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new User($record['id'], $record['login'], $record['mail'], null, $record['registration_date']);
            }
        }
        return $result;
    }
    public function getOfficesData(): array
    {
        $result = [];
        $sql = "SELECT * FROM offices ORDER BY id";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0){
            while ($record = $dbResult->fetch_assoc()) {
                $result[] = new Office($record['id'], $record['country'], $record['city'], $record['address'],$record['phone_number'],$record['working_hours']);
            }
        }
        return $result;
    }

    public function addReview(Review $rev) {
        $everything_fine = true;
        $v1 = $rev->getAuthor();
        $v2 = $rev->getMail();
        $v3 = $rev->getRating();
        $v4 = $rev->getComment();
        if(empty($v1) || empty($v2) || empty($v3) || empty($v4)) {
            $everything_fine = false;
        }
        elseif (str_contains($v2, '@') == false) {
            $everything_fine = false;
        }
        elseif ($v3>10 || $v3 < 0) {
            $everything_fine = false;
        }
        if ($everything_fine) {
            $stmt = $this->db->prepare("INSERT INTO reviews(author, mail, rating, comment, likes, dislikes) VALUES(?,?,?,?,0,0)");
            $stmt->bind_param('ssis', $v1, $v2, $v3, $v4);
            $stmt->execute();
            return true;
        }
        return false;

    }


    public function getCountEmployees() {
        return $this->db->query("SELECT COUNT(*) FROM employees");
    }

    public function addLike(int $id)
    {
        $stmt = $this->db->prepare("UPDATE reviews SET likes = likes + 1 WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
    }

    public function addDislike(int $id)
    {
        $stmt = $this->db->prepare("UPDATE reviews SET dislikes = dislikes + 1 WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
    }

    public function DeleteReview(mixed $id)
    {
        $stmt = $this->db->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
    }
    public function DeleteUser(mixed $id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
    }

    public function registrateUser(User $user) {
        $everything_fine = true;
        $v1 = $user->getLogin();
        $v2 = $user->getMail();
        $v3 = $user->getPassword();
        $v4 = $user->getRegistrationDate();
        if(empty($v1) || empty($v2) || empty($v3) || empty($v4)) {
            $everything_fine = false;
        }
        elseif (str_contains($v2, '@') == false) {
            $everything_fine = false;
        }
        if (!$this->checkUniqUserLogin($v1) || !$this->checkUniqUserMail($v2)) {
            $everything_fine = false;
        }

        if ($everything_fine) {
            $stmt = $this->db->prepare("INSERT INTO users(login, mail, password, registration_date) VALUES(?,?,?,?)");
            $stmt->bind_param('ssss', $v1, $v2, $v3, $v4);
            $stmt->execute();
            return true;
        }
        return false;

    }
    public function checkUniqUserLogin( $login) {
        //return $this->db->query("SELECT COUNT(*) FROM employees");
            $result = $this->db->query("SELECT * FROM users WHERE login = '".$login."'");
            //$result = $resultDB->fetch_assoc();
            //echo "<script type='text/javascript'>alert('Log ".$result."')</script>";
            if ($result->num_rows > 0) {
                return false;
            }
            return true;
    }
    public function checkUniqUserMail( $mail) {

        $result = $this->db->query("SELECT * FROM users WHERE mail = '".$mail."'");
        if ($result->num_rows > 0) {
            return false;
        }
        return true;
    }
    public function getUser( $login)
    {
        $sql = "SELECT * FROM users WHERE login='".$login."'";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0){
            $record = $dbResult->fetch_assoc() ;
            $result = new User($record['id'], $record['login'], $record['mail'], $record['password'], $record['registration_date']);
            return $result;
        }
        return null;
    }
    public function getUserById( $id)
    {
        $sql = "SELECT * FROM users WHERE id='".$id."'";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0){
            $record = $dbResult->fetch_assoc() ;
            return $record;

        }
        return null;

    }
    public function updateUser(User $user)
    {
        $stmt = $this->db->prepare("UPDATE users SET login = '".$user->getLogin()."', mail = '".$user->getMail()."', registration_date = '".$user->getRegistrationDate()."' WHERE id ='".$user->getId()."'");
        $stmt2 = "UPDATE users SET login = '".$user->getLogin()."', mail = '".$user->getMail()."', registration_date = '".$user->getRegistrationDate()."' WHERE id ='".$user->getId()."'";
        $stmt->execute();
        return $stmt2;
    }

    public function addEmploee($name1, $description1, $photo_path1,
                               $name2, $description2, $photo_path2,
                               $name3, $description3, $photo_path3,
                               $name4, $description4, $photo_path4) {
        $everything_fine = true;

        if(empty($name1) || empty($description1) || empty($photo_path1)) {
            $everything_fine = false;
        }
        if(empty($name2) || empty($description2) || empty($photo_path2)) {
            $everything_fine = false;
        }
        if(empty($name3) || empty($description3) || empty($photo_path3)) {
            $everything_fine = false;
        }
        if(empty($name4) || empty($description4) || empty($photo_path4)) {
            $everything_fine = false;
        }

        if ($everything_fine) {
            $stmt = $this->db->prepare("INSERT INTO employees(name, description, photo_path) VALUES(?,?,?)");
            $stmt->bind_param('sss', $name1, $description1, $photo_path1);
            $stmt->execute();
            $stmt->bind_param('sss', $name2, $description2, $photo_path2);
            $stmt->execute();
            $stmt->bind_param('sss', $name3, $description3, $photo_path3);
            $stmt->execute();
            $stmt->bind_param('sss', $name4, $description4, $photo_path4);
            $stmt->execute();
            return true;
        }
        return false;

    }

}