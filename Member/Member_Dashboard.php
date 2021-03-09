<?php 
  session_start();

  if($_SESSION['mid'] == "")
  {
      header("location:home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Member Dashboard</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <div style="background-color:#696969; width:100%; height:75px;">
    <a style="font-size:40px; color:#f0a73a; padding-left:10px; padding-top:15px;">DASHBOARD</a>
    <!-- <button class="lbtn" href="Logout.php" style="background-color:blueviolet; float:right; padding:5px; border-radius:10px; margin-top:15px; margin-left:10px;">LOGOUT</button> -->
    <a href="Logout.php" style="background-color:#ffffff; float:right; padding:5px; border-radius:10px; margin-top:15px; margin-left:20px;">Logout</a>
    <a style="font-size:25px; color:#ffffff; padding-left:10px; float:right; padding-top:15px;">Hello,<?php echo $_SESSION['mname'];  ?></a>
  </div>

  <div class="d-flex" id="wrapper">
    <!-- <a style="text-align:left; text-size:15px; ">Dashboard</a> -->
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!-- <div class="sidebar-heading">Dashboard</div> -->
      <div class="list-group list-group-flush">
        <a href="Edit_Profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a>
        <a href="New_Password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a> -->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
      </div>
    </div>
    

</body>

</html>
