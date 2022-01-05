<?php
require "php_files/classes/App.php";

$app = new App();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <?php
    include("php_files/header_links.php");
    ?>

</head>
<body>
<?php
include("php_files/header_navbar.php");
?>
<script type="text/javascript">
    $(document).ready(function (){
        readOffices();
    });

</script>
<section>
    <div class="container">
        <h1 class="h1_title">Contacts info: </h1>
        <?php if(isset($_SESSION['logged_user'])) : ?>
            <?php if($_SESSION['logged_user']->getLogin() == "admin") : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary margin_bottom" data-toggle="modal" data-target="#addOffice">
                    Add Office
                </button>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Modal -->
        <div class="modal fade" id="addOffice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label>Country</label>
                            <input type = "text" id ="country" maxlength=30
                                   class="form-control" placeholder="Country">
                        </div>
                        <div class = "form-group">
                            <label>City</label>
                            <input type = "text" id ="city" maxlength=30
                                   class="form-control" placeholder="City">
                        </div>
                        <div class = "form-group">
                            <label>Address</label>
                            <input type = "text" id ="address" maxlength=30
                                   class="form-control" placeholder="Address">
                        </div>
                        <div class = "form-group">
                            <label>Phone number</label>
                            <input type = "text" id ="phone_number" maxlength=16
                                   class="form-control" placeholder="Phone number">
                        </div>
                        <div class = "form-group">
                            <label>Working hours</label>
                            <input type = "text" id ="working_hours" maxlength=100
                                   class="form-control" placeholder="Working hours">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" name="add_office" onclick="addOffice()" >Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12">
                <img class="w-100 margin_bottom" src="img/contacts_img.jpg" alt = "">
            </div>
            <div class="col-xl-6 col-lg-12 margin_bottom">

                <div id = "offices_table"> </div>

            </div>
        </div>

    </div>
</section>
</body>
</html>