<?php session_start(); 
      include_once 'Connection.php';
      include_once 'Header.php';
      include_once 'Footer.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="css/logincss.css" rel="stylesheet">
</head>
<body>
   <?php 
      if(isset($_REQUEST['btnLogin']))
      {

          $usr=$_POST["email"];
          $pas=$_POST["pwd"];
          $sql = "select count(*) from tbl_member where email ='$usr' and password=md5('$pas') and member_type='Admin' ";
          $result = mysqli_query($conn,$sql);
          $rows=mysqli_fetch_array($result);

          if ($rows["count(*)"]> 0) {

            $sql = "select * from tbl_member where email ='$usr' and password=md5('$pas') and member_type='Admin'";
            $result = mysqli_query($conn,$sql);
            $rows=mysqli_fetch_array($result);

            $_SESSION["mid"]=$rows["mid"];
            $_SESSION["mbType"]=$rows["member_type"];
            $_SESSION["mpass"] = $rows['password'];
            $_SESSION['mname'] = $rows['mname'];
            $_SESSION['uimg'] = $rows['image'];
            // $_SESSION['wing'] = $rows['wing'];

            header("location:Admin/Admin_Dashboard.php");
           
          }
          }
  ?>
  <form id="lgForm" action="" method="POST">
    <h1><b style="color:#35cebe;">ADMIN LOGIN</b></h1>
    <div class="tab">USER ID:
      <p><input type="email" placeholder="Enter email..." oninput="this.className = ''" name="email" id="user"></p>
    </div>
    <span style="color: red;"><?php //echo $error_email; ?></span><br>
    <div class="tab">PASSWORD:
      <p><input type="password" placeholder="Enter Password...." oninput="this.className = ''" name="pwd" id="pass"></p>
    </div>
    <span style="color: red;"><?php //echo $Pass_error; ?></span>
    <span style="color: red;"><?php //echo $err; ?></span>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" value="Login" onclick="next()" name="btnLogin" style="background-color:#35cebe; color:#ffffff;">
      </div>
    </div>
    <a href="Forgot_Password.php">Forgot Password?</a>
  </form>

  <script>
    function next()
    {
      var inp = document.getElementsByTagName("input");
      // var y = document.getElementById("user");

      var i;
      for(i=0;i<inp.length;i++)
      {
        if(inp[i].value == "")
        {
          inp[i].classList.add("invalid");
        }
      }
    }
  </script>

</body>
</html>
<?php ob_flush(); ?>