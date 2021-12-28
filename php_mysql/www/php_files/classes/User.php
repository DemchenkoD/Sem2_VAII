<?php

class User
{
    private $id;
    private $login;
    private $mail;
    private $registrationDate;
    private $password;

    public function __construct($p_id, $p_login, $p_mail,  $p_password, $p_registrationDate)
    {
        $this->id = $p_id;
        $this->login = $p_login;
        $this->mail = $p_mail;
        $this->registrationDate = $p_registrationDate;
        $this->password = $p_password;

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate($registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    public function getMail()
    {
        return $this->mail;
    }


    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

}