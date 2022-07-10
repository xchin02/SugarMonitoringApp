<?php
// php file that contains the common database connection code
include "dbFunction.php";

$username = $_POST['username'];
$password = $_POST['password'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == 1) {
    $message = "The username " . $username . " already exists</br>Proceed to <a href='index.php'>Login</a>";
} else {

    $query = "INSERT INTO user
          (username,password, height, weight) 
          VALUES 
          ('$username',SHA1('$password'), $height, $weight)";

    $status = mysqli_query($link, $query);

    if ($status) {
        $message = "Your new account has been successfully created.</br> 
                You are now ready to <a href='index.php'>Login</a>.";
    } else {
        $message = "Account Creation Failed</br>Return to <a href='index.php'>Register</a> page";
    }
}
mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>doRegister page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/external.css" rel="stylesheet" type="text/css"/>       
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>

    <body id="registerBody">
        <div class="row" id="appDone">
            <div class="col-sm-12 my-auto">
                <h1 id="appHeading">Sugar Monitoring App</h1>
                <p id="appMessage"><?php echo $message; ?></p>
            </div>
        </div>
    </body>
</html>