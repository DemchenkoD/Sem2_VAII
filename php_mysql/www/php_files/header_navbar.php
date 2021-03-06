<header class="page-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img alt="" class="d-inline-block align-top logo" src="img/logo.png">

                </a>
                <a class="navbar-brand web_name" href="index.php">
                    EasyDesign
                </a>
            </nav>

            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                    type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="employees.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.php">Reviews</a>
                    </li>

                </ul>
                <?php if(isset($_SESSION['logged_user'])) : ?>
                <form class="d-flex" method="post">
                    <div class="me-4"> Hello, <?php echo $_SESSION['logged_user']->getLogin(); ?> </div>

                        <?php if($_SESSION['logged_user']->getLogin() == "admin") : ?>
                            <a class="btn btn-success me-2 users_btn" href="users.php" role="button">Users info</a>
                        <?php endif; ?>
                <input class="btn btn-success me-2" type="submit" name ='logout' value="Log out">
                </form>
                <?php else : ?>
                <form class="d-flex">

                    <a href = "sign_up.php" class="btn btn-success me-2">Sign up</a>
                    <a href = "login.php" class="btn btn-success" >Login</a>

                </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

