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
    if ($_SESSION['accesscode'] != "1")
    {
     header("Location:login.php");
	}

    $id = $_REQUEST["id"];

	date_default_timezone_set("Asia/Singapore");
	$time = date("h:i A");

	$sql = "UPDATE checkintbl SET Checkout = '$time' WHERE Id = $id ";

    $result=mysqli_query($dbconn,$sql);

    if($result){
      header("Location:checkinsystem.php");
	}
    else{
     echo("fail");
	}

?>