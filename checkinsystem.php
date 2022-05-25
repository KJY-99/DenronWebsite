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
    <title></title>
</head>
<body>
        <div class="title">CHECK IN SYSTEM</div>
        <br />
        <br />

<form action="checkin.php" method="post">
<input type="submit" class="action" value="Check-In" id="insertbtn" style="float:left; margin-right:20px;"/>
</form>

<form action="applyleave.php" method="post">
<input type="submit" class="action" value="Apply Leave" id="applyleave" style="float:left; margin-right:20px;"/>
</form> 

<a href="home.php" style="float:left;">Back to Home</a>

<Br>
<Br>
<table border="1" width="940px">
            <tr>
                <td>Date</td>
                <td>Name</td>
                <td>Check-in</td>
                <td>Check-out</td>
				<td>Location</td>
                <td>MC/Valid Leave</td>
                <td>Action</td>
        <?php           
            $sql = "SELECT * FROM checkintbl WHERE Name = '" . $_SESSION['username'] ."'";
            $result = mysqli_query($dbconn,$sql);

            while ($data = mysqli_fetch_assoc($result))
            {					
					echo "<tr><td>" .date('d-m-yy', strtotime($data["Date"])) . "</td>";
					echo "<td>" . $data["Name"] . "</td>";

					if (is_null($data["Checkin"])) {
						echo "<td></td>";
						}
					else {
						echo "<td>" . date('g:i A', strtotime($data["Checkin"])) . "</td>";
						}
					if (is_null($data["Checkout"]))
					{	
						echo "<td></td>";
					}
					else{
						echo "<td>" . date('g:i A', strtotime($data["Checkout"])) . "</td>";
					}

					echo "<td>" . $data["Location"] . "</td>";
					echo "<td>" . $data["Reason"] . "</td>";
				
                
        ?>
        <td width="140px;">
		<form action= "checkoutprocess.php" method="post">
		<input type="hidden" name="id" value="<?php echo $data['Id'] ?>"/>
		<input type="submit" class="action" value="Check-out" id="checkoutbtn"/>
		</form>

        <form action="deleteprocess.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data["Id"] ?>"/>
        <input type="submit" class="action" value="Delete" id="deletebtn"/>
        </form>

        </td>
        </tr>
      <?php
        }
      ?>
</table>

    <script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>