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
    <title>Application for Leave</title>
</head>
<body>
    <form action="applyleaveprocess.php" method="post">

       <p>
                <label>Name :</label>
                <input type="text" name="nametxt" id="nametxt" value="<?php echo $_SESSION['username'] ?>" readonly>
       </p>
       <p>
                <label>Reason for Leave: </label>
                <Br>

           <div style="color:red;">Please note:<br>
                                   Once you have applied the leave, let the admin department know of the application for leave<br>
                                   and do NOT insert a new check-in NOR click the checkout button into the table during a leave on the day. </div>
                <br>
                <br>
                <textarea name="reasontxt" id="reasontxt" rows="4" cols= "50"></textarea>
       </p>

         <input type="submit" value="Submit" />
         <input type="reset" value="Clear"/>
    </form>
</body>
</html>