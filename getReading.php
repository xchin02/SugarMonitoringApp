<?php
session_start();
include('dbFunction.php');

$page = $_GET['page'];
$limit = $_GET['limit'];

$startId = ($page -1) * $limit;
$id = $_SESSION['user_id'];

$sqlQuery = "SELECT readingDate, readingTimes, readingLvl FROM sugarreading WHERE (userID = $id) AND (readingID > '" . $startId . "') ORDER BY readingLvl LIMIT $limit";

$result = mysqli_query($link, $sqlQuery);

$response = array();
while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}
echo json_encode($response);
?>








