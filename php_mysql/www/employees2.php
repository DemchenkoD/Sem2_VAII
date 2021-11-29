<?php
    require "php_files/classes/DBStorage.php";

    $db = new DBStorage();
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

<section>
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $count = $db->getCountEmployees();
                    $num = 4;
                    $firstRun = true;
                    /** @var Employee $empl */
                foreach ($db->getEmployeesData() as $empl) {
                        $tmp = $empl->getId() % $num;
                        if ($firstRun) {
                            echo '<div class="carousel-item active">';
                            echo '    <div class="row justify-content-between">';
                            $firstRun = false;
                        }
                        elseif ($empl->getId() % 4 == 1 and $firstRun == false) {
                            echo '<div class="carousel-item">';
                            echo '    <div class="row justify-content-between">';
                        }

                        echo '        <div class="col col-md-6 col-lg">';
                        echo '            <div class="card card_2 ">';
                        echo '                <img src="' . $empl->getPhotoPath() . '" class="card-img-top container" alt="...">';
                        echo '                <div class="card-body">';
                        echo '                    <h5 class="card-title">'. $empl->getName() .'</h5>';
                        echo '                    <p class="card-text">'. $empl->getDescription() .'</p>';
                        echo '                    <a href="#" class="btn btn-primary">Read more</a>';
                        echo '                </div>';
                        echo '            </div>';
                        echo '        </div>';
                    if ($empl->getId() % 4 == 0) {
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

</section>

</body>
</html>












