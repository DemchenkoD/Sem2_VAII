<?php

class Employee
{
    private $id;
    private $name;
    private $description;
    private $photo_path;

    public function __construct($p_id, $p_name, $p_description, $p_photo_path)
    {
        $this->id = $p_id;
        $this->name = $p_name;
        $this->description = $p_description;
        $this->photo_path = $p_photo_path;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPhotoPath()
    {
        return $this->photo_path;
    }

    public function setPhotoPath($photo_path)
    {
        $this->photo_path = $photo_path;
    }

}