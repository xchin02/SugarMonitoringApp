<!DOCTYPE html>
<!--
Allows user to login or register. You can choose to have a separate registration page.
This page is deliberately left blank.

-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/external.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>

    <body id="body">
        <?php include "navbar.php" ?>
        <!Register Form>
    <div class="row">
        <div class="container" id="registerForm">
            <form method="post" action="doRegister.php">   
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <input class="form-control" type="text" placeholder="Enter Username" name="username" id="username" required>
                <br>
                <input class="form-control" type="password" placeholder="Enter Password" name="password" id="password" required>
                <br>
                <input class="form-control" type="number" placeholder="Enter Height (cm)" name="height" id="height" required>
                <br>
                <input class="form-control" type="number" step="0.1" placeholder="Enter Weight (kg)" name="weight" id="weight" required>
                <br>
                <button type="submit" class="btn btn-outline-success">Register</button>
            </form>
        </div>

        <!Carousel Bootstrap>
        <div class="container" id="carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">    
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/sugarintake.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block" id="caption1">
                            <h5>Easily manage your blood sugar readings with this app</h5>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/login.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block" id="caption2">
                            <h5>Login with your username and password</h5>
                            <p>Register if you haven't already!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/elderly.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block" id="caption3">
                            <h5>Low Blood Sugar Levels will lead to a healthy body and smile</h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container col-lg-9 col-sm-11" id="cardContainer">
            <h1>Testimonials</h1>
            <hr>
            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" src="images/testimonial1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">This app is amazing!</h5>
                        <p class="card-text">I have been using this app for the past 3 years and it has helped me manage my sugar readings very well. Recording my sugar readings have never been easier! </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/testimonial2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Fantastic app for everyone</h5>
                        <p class="card-text">Simple to use and can view previous sugar readings in an organised table.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/testimonial3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Best sugar monitoring app I have used thus far</h5>
                        <p class="card-text">I have never used a more simple sugar monitoring app before. </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
