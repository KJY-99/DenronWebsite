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
    <title>Check-In Entry</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <script src="js/jquery-3.2.1.min.js"></script>

    <style type="text/css">


        img {
            border: 0;
        }

        #header {
            background: white;
            margin-bottom: 15px;
        }


        #v {
            width: 320px;
            height: 240px;
        }

        #qr-canvas {
            display: none;
        }

        #qrfile {
            width: 320px;
            height: 240px;
        }

        #mp1 {
            text-align: center;
            font-size: 35px;
        }

        #imghelp {
            position: relative;
            left: 0px;
            top: -160px;
            z-index: 100;
            font: 18px arial, sans-serif;
            background: #f0f0f0;
            margin-left: 35px;
            margin-right: 35px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 20px;
        }

        .selector {
            margin: 0;
            padding: 0;
            cursor: pointer;
            margin-bottom: -5px;
        }

        #outdiv {
            width: 320px;
            height: 240px;
            border: solid;
            border-width: 3px 3px 3px 3px;
        }

        #result {
            border: solid;
            border-width: 1px 1px 1px 1px;
            padding: 20px;
            width: 20%;
        }
    </style>


    <script type="text/javascript" src="js/llqrcode.js"></script>
    <script type="text/javascript" src="js/plusone.js"></script>
    <script type="text/javascript" src="js/webqr.js"></script>



</head>
<body>
    <div id="main">
        <form action="checkinprocess.php" method="post">
            
            <p>
                <label>Name :</label>
                <input type="text" name="nametxt" id="nametxt" value="<?php echo $_SESSION['username'] ?>" readonly>
            </p>
            <p>
                <label>Check-in Time :</label>
                <input type="text" name="checkintxt" id="checkintxt" readonly />
            </p>
            <p>
                <label>Location :</label> <Br /> <Br />
                Please scan the QR code of the current location you are in.
            </p>
            <div id="mainbody">
                <table class="tsel" border="0" width="100%">
                    <tr>
                        <td valign="top" align="left" width="50%">
                            <table class="tsel" border="0">
                                <tr>
                                    <td><a class="selector" id="webcamimg" onclick="setwebcam()" align="left" /></td>
                                    <td><a class="selector" id="qrimg" onclick="setimg()" align="right" /></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td colspan="2" align="left">
                                        <div id="outdiv">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="100%" align="left">
                            <div id="result"></div>
                        </td>
                    </tr>
                </table>

            </div>&nbsp;
            </p>
            <input type="submit" value="Check-in" />
        </form>
        <script>
            var date = new Date();
            var hour = ((date.getHours() + 11) % 12 + 1);
            var mid1 = 'AM';

            if (date.getHours() > 12) {
                mid1 = 'PM';
            }

            document.getElementById('checkintxt').value = ("0" + hour).slice(-2) + ":" + ("0" + date.getMinutes()).slice(-2) + " " + mid1;

        </script>
    </div>

    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <script type="text/javascript">
        load();
    </script>
</body>

</html>