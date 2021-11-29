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
}
}