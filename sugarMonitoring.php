<?php
session_start();
/*
  This page is the main page. It allows user to enter sugar level readings, and view previous entries entered.
  This page is deliberately left blank.

 */
include("dbFunction.php");
$id = $_SESSION['user_id'];
$limit = 7; //the number of rows to display per page
$query = "SELECT count(*) FROM sugarreading WHERE userID = $id";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_row($result);
$totalRows = $row[0];

$numPages = ceil($totalRows / $limit); //round up integer
mysqli_close($link);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sugar Monitoring</title>
        <link href="css/external.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="js/sugarreadingMsg.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {

                //call getPosts() to load the first page
                getPosts("1");
                //Attach a click listener to all page links in the pagination
                //retrieve the page number that the user clicked
                //call getPosts() passing in the page number
                $(".page-link").click(function () {
                    var page = parseInt($(this).html());
                    getPosts(page);
                });
            });

            //AJAX call to getReadinge.php passing in the page and limit as parameters
            function getPosts(page) {
                $.ajax({
                    type: "GET",
                    url: "getReading.php",
                    data: "page=" + page + "&limit=<?php echo $limit ?>",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var message = "";
                        for (i = 0; i < response.length; i++) {
                            message += "<tr><td>" + response[i].readingDate + "</td>"
                                    + "<td>" + response[i].readingTimes + "</td>"
                                    + "<td>" + response[i].readingLvl + "</td></tr>";
                                    
                        }
                        $("tbody").html(message);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
        </script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container" id="readingForm">
            <form method="post" action="insertReading.php">

                <h2>Blood Sugar Level Readings</h2>
                <hr>
                <h5>Reading Taken after:</h5>
                <select name="readingTime" id="readingTime" class="form-control">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                </select>
                <p>Readings are to be taken 2 hours after each meal</p>
                <h5>Blood Sugar Level Readings (in mmol/L):</h5>
                <input class="form-control" type="number" step="0.1" name="readingLevel" id="readingLevel" required>
                <br>
                <button type="submit" class="btn btn-outline-success">Submit Reading</button>
            </form>
        </div>

        <div class="container" id="readingTable">
            <h1>Sugar Readings Table</h1>
            <hr>
            <table id="tbDetails" class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>After-Meals Readings</th>
                        <th>Reading</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <nav>
                <!-- Enter codes to display pagination component to allow user navigate across pages -->
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $numPages; $i++) { ?>
                        <li class="page-item"><a class="page-link" href="#"><?php echo $i ?></a></li>
                        <?php } ?>
                </ul>
            </nav>
        </div>
    </body>
</html>
