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

	$na = $_REQUEST['nametxt'];
	$ci = $_REQUEST["checkintxt"];
	$ln = $_REQUEST["locationtxt"];
	

    $sql ="INSERT INTO checkintbl(Name,Checkin,Location) VALUES ('$na' , '$ci', '$ln' )";

    $result=mysqli_query($dbconn,$sql);

    if($result){
      header("Location:checkinsystem.php");
	}
    else{
      echo ("ERROR: Could not able to execute $sql.");	
	 }

?>
