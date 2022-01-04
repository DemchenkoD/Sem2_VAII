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
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-12">
                <img class="w-100 margin_bottom" src="img/contacts_img.jpg" alt = "">
            </div>
            <div class="col-xl-6 col-lg-12 margin_bottom">

                <div id = "offices_table"> </div>

                <div class="row">
                    <h4 class="col h4_contacts"> Address:</h4>
                    <div class="col"> Zilina, 010 08, Vysokoskolakov 20</div>
                </div>
                <div class="row">
                    <h4 class="col h4_contacts"> Email:</h4>
                    <div class="col"> info@easydesign.com</div>
                </div>
                <div class="row">
                    <h4 class="col h4_contacts"> Phone number:</h4>
                    <div class="col"> +421 999 333 444</div>
                </div>
                <div class="row">
                    <h4 class="col h4_contacts"> Working hours:</h4>
                    <div class="col"> MON - FRI / 8am to 7pm</div>
                </div>
            </div>
        </div>

    </div>
</section>
</body>
</html>