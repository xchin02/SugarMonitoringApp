<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/external.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <img src='images/logo.jpg' width='55' height='50' id="logo" alt="logo.jpg">
            <a class="navbar-brand" href="index.php"><b>Sugar Monitoring App</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto nav-pills navbar-left">
                    <a class="nav-link" href="#cardContainer" id="linkTestimonial">Testimonials</a>
                </ul>
                <ul class="navbar-nav ml-auto nav-pills navbar-right">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <a id="navbarForm" class="btn btn-outline-primary" href="sugarMonitoring.php" role="button">Sugar Readings</a>
                        <a class="btn btn-outline-success" href="doLogOut.php">Logout</a>
                    <?php } else { ?>
                        <form action="doLogin.php" method="post" class="form-inline">
                            <input id="navbarForm" class="form-control" id="id_username" type="text" name="username" placeholder="Username" required/>
                            <input id="navbarForm" class="form-control" id="id_password" type="password" name="password" placeholder="Password" required/>
                            <button type="submit" class="btn btn-outline-success">Login</button>
                        </form>
                    <?php } ?>
                </ul>   
            </div>
        </nav>
    </body>
</html>
