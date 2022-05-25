<?php 
 
 require_once("db.php");
 session_start();


 if (isset($_POST['access'])) { 

    $errors = "";
    $fields = array("utxt","ptxt");

    foreach($fields as $key => $fieldname){
       if (!isset($_POST[$fieldname]) && empty($_POST[$fieldname])){
            echo "please enter username and password";
            $errors++;
      }
    }
 }

// if it is filled, post username and password and check with mysql server

 if ($errors <= 0) {

    $username = $_REQUEST['utxt'];
    $password = $_REQUEST['ptxt'];
 }

    
      $sql = "SELECT * FROM usertbl WHERE username ='$username' AND password = '$password'";

      $result = mysqli_query($dbconn,$sql);

      $data = mysqli_fetch_assoc($result);

      if ($data)
      {
            $_SESSION['logincode'] = "ajkhsdkjhhiuheiuhehuhffuh";
            $_SESSION['username'] = $data["username"];
            $_SESSION['accesscode'] = $data["accesslevel"];

            if($_SESSION['accesscode'] == "1")
            {
                header("Location:adminview.php");     
			}
            if($_SESSION['accesscode'] == "2")
            {
                header("Location:home.php");
            }
      }
      else 
      {
           echo "Login Failed";
           header("Location:login.php");
	  }
    
?>
