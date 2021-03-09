<?php session_start(); 
        include_once 'Connection.php';
?>
<?php 
        $error_email = "";
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        if(isset($_REQUEST['submitOTP']))
        {
            $email = $_REQUEST["email"];
            $_SESSION['femail'] = $_REQUEST["email"];
            $query = "select count(*) as count from tbl_member where email='$email'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $total = $row["count"];    

            if (empty($_REQUEST["email"])) {
                $error_email = "Email is required";
            } else {
                $emails = test_input($email);
                if (!filter_var($emails, FILTER_VALIDATE_EMAIL) || $total <= 0) {
                    $error_email = "Invalid email format or Email is not exist!!";
                }
                else
                {
                    
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                    $rndno = rand(100000, 999999); //OTP generate
                    $_SESSION["otp"] = $rndno;
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->Username = '18bmiit042@gmail.com';
                    $mail->Password = 'tushar#1711';
                    $mail->SMTPSecure = 'tls';
                    $mail->setFrom('18bmiit042@gmail.com');
                    $mail->addAddress($email);
                    $mail->Subject = 'MySociety - Forgot Password';
                    $message_body = "Hi! Your OTP is ".$_SESSION['otp'];
                    $mail->Body = $message_body;
                    $mail->send();
                    echo "<script>";
                    echo "alert('OTP sent successfully!');";
                    //echo "window.location.href='otp.php?fname=$fname&lname=$lname&gender=$gender&email=$email&contact=$contact&password=$password&utype=$utype'";
                    echo "</script>";
                    header('location:OTP.php');
                }    
                

            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

  ?>
  
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="logincss.css" rel="stylesheet">
</head>
<body>

  <form id="regForm" action="Forgot_Password.php" method="POST">
    <h1><b style="color:#f0a73a;">FORGOT PASSWORD</b></h1>
    <div class="tab">EMAIL ID:
      <p><input type="email" placeholder="Enter email..." oninput="this.className = ''" name="email"></p>
      <span style="color: red;"><?php echo $error_email; ?></span>
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" value="Submit" name="submitOTP" type="button" id="nextBtn">
      </div>
    </div>
  </form>

  


  
</body>
</html>
