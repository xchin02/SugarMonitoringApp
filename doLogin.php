<?php
session_start();
$msg = "";

//retrieve form data
$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

//connect to database
include ("dbFunction.php");

//match the username and password entered with database record
$query = "SELECT userid, username FROM user
                  WHERE username='$entered_username' AND 
                  password = SHA1('$entered_password')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

//if record is found, store id and username into session
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION['user_id'] = $row['userid'];
    $_SESSION['username'] = $row['username'];

    header("location: sugarMonitoring.php");
} else { //record not found
    $msg = "Sorry, you must enter a valid username 
                    and password to log in.</br>
                    <a href='index.php'>Return to login page</a>.</p>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>doLogin</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/external.css" rel="stylesheet" type="text/css"/>       
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body id="appBody">
        <div class="row" id="appDone">
            <div class="col-sm-12 my-auto">
                <h1 id="appHeading">Sugar Monitoring App</h1>
                <p id="appMessage"><?php echo $msg; ?></p>
            </div>
        </div>
    </body>
</html>