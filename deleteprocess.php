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
	
	$sql="delete from checkintbl where Id= $id";
	
	$result=mysqli_query($dbconn,$sql);
	
	if($result)
	{
		header("Location:checkinsystem.php");
	}
	else{
		echo("fail");
	}
?>
