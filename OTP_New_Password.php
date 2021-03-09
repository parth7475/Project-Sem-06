<?php 
session_start();
    include_once 'Connection.php';
    // include_once 'Member_Dashboard.php';
    // if($_SESSION['mid'] == "")
    // {
    //     header("location:home.php");
    // }

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

        if(isset($_REQUEST['nPassword']))
        {
            // $op = $_REQUEST['opass'];
            $np = $_REQUEST['npass'];

            if(empty($_REQUEST['npass']) )
            {
                $otp_error = "All Field Must Be Entered!!!";
            }
            else
            {
               
                  $np = $_REQUEST['npass'];
                  $q = "update tbl_member set password = md5('$np') where email=".$_SESSION['femail'];  
                  echo '<script>alert("Password Updated Successfully!!!");</script>';
                    header("location:Login.php");
            }
                
                  
            }

  ?>

<form id="regForm" action="" method="POST">
    <h1><b style="color:#f0a73a;">CHANGE PASSWORD</b></h1>
    <div class="tab">NEW PASSWORD:
      <p><input type="password" placeholder="Enter New Password..." name="npass" ></p>
    </div>
    <span style="color: red;"><?php echo $otp_error; ?></span>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" value="Submit" name="nPassword">
      </div>
    </div>
  </form>


</body>
</html>
