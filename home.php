<?php
    require_once("db.php");
    session_start();
    if (!isset($_SESSION['logincode']))
    {
      header("Location:login.php");
	}
    if ($_SESSION['logincode'] != "ajkhsdkjhhiuheiuhehuhffuh")
    {
     header("Location:login.php");
	}
    if ($_SESSION['accesscode'] != "2")
    {
     header("Location:login.php");
	}
 ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>Check in to Client Company</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <style>
        #map {
            width:1000px;
            height:500px;
        }
    </style>
</head>

    <?php
    if(isset($_SESSION["username"]))
    {
    echo "Welcome to home page, ".$_SESSION["username"]."";
    }

    else{
    echo "NO DATA";
    }
    ?>
    <a href="logout.php">Logout</a>
    <br />
   <div id='mapdiv' style='height:400px; width:500px;'>
   </div>
   <br />
   You are currently at <div name='location' id='locationdiv'> </div>
   <br />
    <a href="DENRON_Customer_Service_Report.php" style="margin-right: 30px" onclick="TimeCalculator();">Customer Service Report</a>
    <a href="" style="margin-right: 30px;">Maintenance Report</a>
    <a name="checkinsystembtn" href="checkinsystem.php">Check-in System</a>
	
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.onemap.sg/leaflet/onemap-leaflet.js"></script>
	<script src="js/geolocationsystem.js"></script>
</body>
</html>