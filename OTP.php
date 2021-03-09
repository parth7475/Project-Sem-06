<?php session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="logincss.css" rel="stylesheet">
</head>
<body>


  <?php 
        $otp_error = "";

        if(isset($_REQUEST['VerifyOTP']))
        {
            if(empty($_REQUEST['otp']))
            {
                $otp_error = "OTP is Required!!!";
            }
            else
            {
                if($_REQUEST['otp'] == $_SESSION['otp'])    
                {
                    header("location:OTP_New_Password.php");
                }
                else
                {
                    $otp_error = "Wrong OTP Entered!!!"; 
                }
            }
        }

  ?>

<form id="regForm" action="" method="POST">
    <h1><b style="color:#f0a73a;">OTP VERIFICATION</b></h1>
    <div class="tab">OTP:
      <p><input type="text" placeholder="Enter OTP..." name="otp" ></p>
    </div>
    <span style="color: red;"><?php echo $otp_error; ?></span>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" value="Submit" name="VerifyOTP">
      </div>
    </div>
  </form>


</body>
</html>
