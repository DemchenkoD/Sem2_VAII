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
    <title>Employees</title>

    <?php
    include("php_files/header_links.php");
    ?>

</head>
<body>
<?php
include("php_files/header_navbar.php");
?>
<h1 class="container h1_title"> Our Employees: </h1>
<div>
    <div class="container">

        <?php if (isset($_SESSION['logged_user'])) : ?>

            <?php if ($_SESSION['logged_user']->getLogin() == "admin") : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary margin_bottom" data-toggle="modal"
                        data-target="#addEmployee">
                    Add Employee
                </button>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Modal -->
        <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name 1</label>
                            <input type="text" id="name1" maxlength=30
                                   class="form-control" placeholder="Name 1">
                        </div>
                        <div class="form-group">
                            <label>Description 1</label>
                            <input type="text" id="description1"
                                   class="form-control" placeholder="Description 1">
                        </div>
                        <div class="form-group">
                            <label>Photo path 1</label>
                            <input type="text" id="photo_path1"
                                   class="form-control" placeholder="Photo path 1">
                        </div>
                        <div class="form-group">
                            <label>Name 2</label>
                            <input type="text" id="name2" maxlength=30
                                   class="form-control" placeholder="Name 2">
                        </div>
                        <div class="form-group">
                            <label>Description 2</label>
                            <input type="text" id="description2"
                                   class="form-control" placeholder="Description 2">
                        </div>
                        <div class="form-group">
                            <label>Photo path 2</label>
                            <input type="text" id="photo_path2"
                                   class="form-control" placeholder="Photo path 2">
                        </div>
                        <div class="form-group">
                            <label>Name 3</label>
                            <input type="text" id="name3" maxlength=30
                                   class="form-control" placeholder="Name 3">
                        </div>
                        <div class="form-group">
                            <label>Description 3</label>
                            <input type="text" id="description3"
                                   class="form-control" placeholder="Description 3">
                        </div>
                        <div class="form-group">
                            <label>Photo path 3</label>
                            <input type="text" id="photo_path3"
                                   class="form-control" placeholder="Photo path 3">
                        </div>
                        <div class="form-group">
                            <label>Name 4</label>
                            <input type="text" id="name4" maxlength=30
                                   class="form-control" placeholder="Name 4">
                        </div>
                        <div class="form-group">
                            <label>Description 4</label>
                            <input type="text" id="description4"
                                   class="form-control" placeholder="Description 4">
                        </div>
                        <div class="form-group">
                            <label>Photo path 4</label>
                            <input type="text" id="photo_path4"
                                   class="form-control" placeholder="Photo path 4">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" name="add_employee"
                                onclick="addEmployee()">Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $count = $db->getCountEmployees();
                $i = 0;
                $firstRun = true;
                /** @var Employee $empl */
                foreach ($db->getEmployeesData() as $empl) {
                    $i++;
                    if ($firstRun) {
                        echo '<div class="carousel-item active">';
                        echo '    <div class="row justify-content-between">';
                        $firstRun = false;

                    } elseif ($i % 4 == 1 and $firstRun == false) {
                        echo '<div class="carousel-item">';
                        echo '    <div class="row justify-content-between">';
                    }

                    echo '        <div class="col col-md-6 col-lg">';
                    echo '            <div class="card card_2 ">';
                    echo '                <img src="' . $empl->getPhotoPath() . '" class="card-img-top container" alt="...">';
                    echo '                <div class="card-body">';
                    echo '                    <h5 class="card-title">' . $empl->getName() . '</h5>';
                    echo '                    <p class="card-text">' . $empl->getDescription() . '</p>';
                    echo '                    <a href="#" class="btn btn-primary">Read more</a>';
                    echo '                </div>';
                    echo '            </div>';
                    echo '        </div>';
                    if ($i % 4 == 0) {
                        echo '    </div>';
                        echo '</div>';
                    }
                }

                ?>
            </div>


            <button class="carousel-control-prev container" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next container" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>
