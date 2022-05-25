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
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
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
    <br>
    <br>
        <div class="title">CHECK IN SYSTEM</div>
<Br>
<Br>
    <form action="search.php" method="post">
    <input type="text" id="srchtxt" name="srchtxt"/>
    <input type="submit" name="submit-search" value="Search"/>
    </form>

<br>

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
               
           $sql = "SELECT * FROM checkintbl";
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