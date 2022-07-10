<?php
/*
This page is to used to insert sugar reading into the table sugarreading (mySQL)
This page is deliberately left blank.
*/ 
session_start();
include "dbFunction.php";

date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d'); // Retreive the current date of user's entry

//Retrieve user's readingTimes and readinglevel
$readingTimes = $_POST['readingTime'];
$readingLevel = $_POST['readingLevel'];
$userid = $_SESSION['user_id'];
//Write insert SQL statement to database
$query = "INSERT INTO sugarreading(userID, readingDate, readingTimes, readingLvl) VALUES ($userid, '$date', '$readingTimes', $readingLevel)";
//Execute SQL statement 
$status = mysqli_query($link, $query) or die (mysqli_error($link));
    if ($status) {
        header("location: sugarMonitoring.php");
    } else {
        $message = "Reading insert failed.";
    }
//Close db
mysqli_close($link)

?>


