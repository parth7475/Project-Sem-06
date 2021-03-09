
----- select cities based on state
<input type="submit" name="selState" value='select'>

            <!-- <button type="button" name="selState" id="selState" style="margin-top: 10px;">Select</button> -->
            <?php 
                if(isset($_REQUEST['selState']))
                {
                    $_SESSION['stid'] = $_REQUEST['state'];
                }
            ?>


            LOGIN


            $error_email = " ";
      $Pass_error = " ";
      $err = " ";

      
      if(isset($_REQUEST['btnLogin']))
      {
          $email = $_REQUEST['email'];
          $pass = $_REQUEST['pwd'];

          if (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                  // echo "<br><my class='Red'>Invalid Email ID!</my>";
                    $error_email =  "Invalid Email ID!";
              } else if (strlen($pass) < 8)
              {
                  $Pass_error = "Password must be 8 character long!";
              }
              else
              {
                  $q = "select mid,member_type from tbl_member where email='$email' and password=md5('$pass')";
                  $check = mysqli_query($conn,$q);

                  if (!$row = mysqli_fetch_assoc($check))
                  {
                      echo $q;
                      echo $row['mid'];
                      echo "<br><my class='Red'>Invalid Email ID/Password!</my>";
                  } else
                  {
                      $_SESSION["mid"] = $email;
                      $_SESSION["mbType"] = $row['member_type'];
                      $mt = $row['member_type']; 
                      
                            if($mt == "Member")
                            {
                              header("location:Member_Dashboard.php");
                            }
                            elseif($mt == "Secretary")
                            {
                              header("location:Secretary_Dashboard.php");  
                            }
                            elseif($mt == "President")
                            {
                              header("location:President_Dashboard.php");
                            }
                            else
                            {
                              header("location:SPresident_Dashboard.php");
                            }
                  }
              }
          }
        // $email = $_REQUEST['email'];
        // $query = "select count(*) as count from tbl_member where email='$email'";
        // $result = mysqli_query($conn, $query);
        // $row = mysqli_fetch_assoc($result);
        // $total = $row["count"];    

        // if (empty($_REQUEST["email"])) {
        //     $error_email = "Email is required";
        // } else {
        //     $emails = test_input($email);
        //     if (!filter_var($emails, FILTER_VALIDATE_EMAIL) || $total <= 0) {
        //         $error_email = "Invalid email format or Email is not exist!!";
        //     }
        // }
        
        // $pass = $_REQUEST["pwd"];
        // $query = "select password,member_type,mid from tbl_member where email='$email'";
        // $result = mysqli_query($conn, $query);
        // $row = mysqli_fetch_assoc($result);
        // $dbpass = $row["password"];
        // $mt = $row["member_type"];
        // $_SESSION['mType'] = $mt;
        // $mbid = $row["mid"];
        // $_SESSION['mbID'] = $mbid;
        
        // if(empty($_REQUEST["pwd"]))
        // {
        //     $Pass_error = "Password is required";
        // }
        // else
        // {
        //     if($pass == $dbpass)
        //     {
        //       if($mt == "Member")
        //       {
        //         header("location:Member_Dashboard.php");
        //       }
        //       elseif($mt == "Secretary")
        //       {
        //         header("location:Secretary_Dashboard.php");  
        //       }
        //       elseif($mt == "President")
        //       {
        //         header("location:President_Dashboard.php");
        //       }
        //       else
        //       {
        //         header("location:SPresident_Dashboard.php");
        //       }
        //     }   

       

      // }

                        // $uname = $_REQUEST["email"];
                        // $password = $_REQUEST["pwd"];
                        // if (!filter_var($uname, FILTER_VALIDATE_EMAIL))
                        // {
                        //     // echo "<br><my class='Red'>Invalid Email ID!</my>";
                        //      $error_email =  "Invalid Email ID!";
                        // } else if (strlen($password) < 8)
                        // {
                        //     $Pass_error = "Password must be 8 character long!";
                        // } else
                        // {
                        //     $query = "select count(*) as count,mid,member_type from tbl_member where email='$uname' and pwd='$password')";
                        //     $rs = mysqli_query($conn, $query);
                        //     $mt = "";
                        //     if($row = mysqli_fetch_row($rs))
                        //     {
                        //         $_SESSION['mbType'] = $row['member_type'];
                        //         $_SESSION['mid'] = $row['mid'];
                        //         $mt = $row['member_type'];
                        //         if($row["count"] <= 0)
                        //         {
                        //           $err = "Invalid Email ID/Password!";
                        //         }
                        //     } else
                        //     {
                        //       if($mt == "Member")
                        //         {
                        //           header("location:Member_Dashboard.php");
                        //         }
                        //         elseif($mt == "Secretary")
                        //         {
                        //           header("location:Secretary_Dashboard.php");  
                        //         }
                        //         elseif($mt == "President")
                        //         {
                        //           header("location:President_Dashboard.php");
                        //         }
                        //         else
                        //         {
                        //           header("location:SPresident_Dashboard.php");
                        //         }
                        //       }
                        //     }
                        // }

      // function test_input($data) {
      //   $data = trim($data);
      //   $data = stripslashes($data);
      //   $data = htmlspecialchars($data);
      //   return $data;
      // }

    // }


    ==================================================================================================
    president dashboard che aa aetle delete marto nai.


    <?php 
    include_once '../Connection.php';
    // include_once 'President_Dashboard.php';

    if($_SESSION['mid'] == "")
    {
        header("location:../Home.php");
    }
    // include_once ' Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
      <div class="container" id="output"></div>

      <script>
        $(document).ready(function(){
        function getData(){
            $.ajax({
                type: 'POST',
                url: 'AM.php',
                success: function(data){
                    $('#output').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData(); 
        }, 6000);  // it will refresh your data every 1 sec

    });
      </script>

</body>
</html>


========================================================================================================
AM.php


<?php 
    
    include_once '../Connection.php';
    // include_once 'President_Dashboard.php';

    // if($_SESSION['mid'] == "")
    // {
    //     header("location:../Home.php");
    // }
    // include_once ' Connection.php';
      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
  	<link rel="stylesheet" href="../css/normalize.css">
  	<link rel="stylesheet" href="../css/milligram.min.css">
	  <link rel="stylesheet" href="../css/styles.css">

    <style>
      #tbl{
        margin-left: 100px;
      }
    </style>

</head>
<body>
    <?php $result = mysqli_query($conn, "SELECT mid,mname,phone,wing,flat,image From tbl_member where is_approved='Pending'");  ?>
    <form action="" method="POST">
    <table style="margin-left: 50px; margin-top: 100px;" id="" class="table table-bordered table-hover" >
        <thead>
          <tr>
            <th scope="col" style="padding-left: 5px;">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Wing</th>
            <th scope="col">Flat No.</th>
            <th scope="col">Image</th>
            <th scope="col">Approve</th>
            <th scope="col">Reject  </th>
          </tr>
        </thead>
          <?php  
            $i = 1;
            while($data = mysqli_fetch_array($result))
            {
          ?>
        <tbody>
          <tr>
            <th scope="row" style="padding-left: 10px;"><?php echo $i; ?></th>
            <?php $mid=$data['mid']; ?>
            <td><?php echo $data['mname']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['wing']; ?></td>
            <td><?php echo $data['flat']; ?></td>
            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'"/>'; ?></td>
            <td><a href='javascript:void(0)' onclick='approve(<?php echo $data['mid']; ?>)'>Approve</a></td>
            <td><a href='javascript:void(0)' onclick='reject(<?php echo $data['mid']; ?>)'>Reject</a></td>     
      <?php $i++; } ?>
              
          </tr>
        </tbody>
        </form>
        
      </table>

      <!-- <h5 class="mt-2">Tables</h5><a class="anchor" name="tables"></a>
			<div class="row grid-responsive" id="tbl">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Current Members</h3>
						</div>
						<div class="card-block" >
							<table  >
								<thead>
									<tr>
										<th>Name</th>
										<th>Phone</th>
										<th>Wing</th>
										<th>Flat No.</th>
                    <th>Image</th>
                    <th>Approve</th>
                    <th>Reject</th>
                  </tr>
								</thead>
								<tbody>
									<tr>
										<td>Jane Donovan</td>
										<td>UI Developer</td>
										<td>23</td>
										<td>Philadelphia, PA</td>
									</tr>
									<tr>
										<td>Jonathan Smith</td>
										<td>Designer</td>
										<td>30</td>
										<td>London, UK</td>
									</tr>
									<tr>
										<td>Kelly Johnson</td>
										<td>UX Developer</td>
										<td>25</td>
										<td>Los Angeles, CA</td>
									</tr>
									<tr>
										<td>Sam Davidson</td>
										<td>Programmer</td>
										<td>28</td>
										<td>Philadelphia, PA</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> -->

      

      <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        function approve(mid)
        {
            var id = mid;
            $.ajax({
              type:"GET",
              url:"app_rej.php",
              // data: "id="+id,
              data: { id: id, action: 'approve' },
              success:function(data)
              {
                // $(#userTable).html(data);
                  alert('deleted');
              }
            });
        }

        function reject(mid)
        {
            var id = mid;
            $.ajax({
              type:"GET",
              url:"app_rej.php",
              // data: "id="+id,
              data: { id: id, action: 'reject' },
              success:function(data)
              {
                // $(#userTable).html(data);
                  alert('deleted');
              }
            });
        }

         
      </script>

</body>
</html>

===================================================================================================
Registration.php


<?php 
  include_once 'Connection.php';
  include_once '../Project/other/validation.php';
  session_start();
?>
<?php 

    $nameErr = "";
    $ContactnoErr = "";
    $imgerror="";
    $emailErr = "" ;
    $passwordErr = "";
    $wingErr = "";
    $flatErr = "";

    if(isset($_REQUEST["regBtn"]) && isset($_FILES["image"]))
    {
        $sid = $_REQUEST['soc'];
        $name = $_REQUEST['name'];
        $mob = $_REQUEST['mob'];    
        $wing = $_REQUEST['wing'];
        $flat = $_REQUEST['flat'];
        $pas = $_REQUEST['pwd'];
        $email = $_REQUEST['email'];
        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"]; 
        $folder = "Image/user/".$filename; 
        // $msg = "";

        $path    = 'Image/user';
        $files = $files = array_diff(scandir($path), array('.', '..'));

        foreach($files as $id => $fname)
        {
            if($fname == $filename)
            {
              $value = explode(".",$filename);    
              $rndno = rand(100,999);
              $filename = $value[0].$rndno.'.'.$value[1];
              $folder = "Image/user/".$filename;
              echo '<script>alert("'.$filename.'");</script>'; 
              break;
            }
        }   

        $query = "insert into tbl_member (sid,mname,phone,wing,flat,image,email,password,member_type) values ($sid,'$name','$mob','$wing','$flat','$filename','$email',md5('$pas'),'Member')";
        $insert = mysqli_query($conn,$query);

        if (move_uploaded_file($tempname, $folder))  { 
          // $msg = "Image uploaded successfully"; 
          echo '<script>alert("success");</script>';
        }else{ 
          echo '<script>alert("fail");</script>';
        } 

      
}
      


?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="css/logincss.css" rel="stylesheet">
</head>
<body>


<form id="regForm" action="Registration.php" method="POST" enctype="multipart/form-data">
    <h1><b style="color:#f0a73a;">Registration</b></h1><br><br>
    <div class="row">
        <div class="column" >
        <div class="tab">Full Name:
        <p><input type="text" placeholder="Enter Full Name..." oninput="this.className = ''" name="name" id="user" title="Name" required></p>
        </div>
        <span style="color: red;"><?php echo $nameErr; ?></span>
        <div class="tab">Mobile Number:
        <p><input type="tel" placeholder="Enter mobile number...." oninput="this.className = ''" name="mob" title="Eight or more characters" maxlength="10" minlength="10" required></p>
        </div>
        <span style="color: red;"><?php echo $ContactnoErr; ?></span>
        <div class="tab">Image:
            <p><input type="file" placeholder="select image...." oninput="this.className = ''" name="image" id="image" /></p>
        </div>
        
        
        <div class="tab" style="margin-bottom: 15px;">State:
            <select name="state" id="state_dropdown">
                <option>--Select your State--</option>
                <?php
                  $records = mysqli_query($conn, "SELECT * From tbl_state where stid=12");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['stid'] ."'>" .$data['sname'] ."</option>";  // displaying data in option menu
                  }	
                ?>
            </select>
          </div>

        <div class="tab" style="margin-bottom: 15px;">City:
           <select name="city" id="city-dropdown">
              <option>--Select your City--</option>
              <?php
                  $records = mysqli_query($conn, "SELECT cname From tbl_city where stid=12");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['cid'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                  }	
                ?>
          </select>
        </div>

        <div class="tab" style="margin-bottom: 15px;">Landmark:
            <select name="landmark" id="landmark-dropdown" onselect="myFunction()">
              <option>--Select your Landmark--</option>
              <?php
                  $records = mysqli_query($conn, "select DISTINCT(landmark) FROM tbl_my_society where cid =54");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['landmark'] ."'>" .$data['landmark'] ."</option>";  // displaying data in option menu
                  }	
                ?>
              </select>
        </div>
        </div>

        <div class="column">
        <div class="tab" style="margin-bottom: 15px;">Society:
              <select name="soc" id="soc">
                  <option>--Select your Society--</option> 
                  <?php
                  $records = mysqli_query($conn, "SELECT sid,sname From tbl_my_society");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['sid'] ."'>" .$data['sname'] ."</option>";  // displaying data in option menu
                  }	
                ?>
              </select>
        </div> 

        <div class="tab">Wing:
            <p><input type="text" placeholder="Enter wing...." oninput="this.className = ''" name="wing" id="wing" required></p>
        </div>
        <span style="color: red;"><?php echo $wingErr; ?></span>
        <div class="tab">Flat No.:
            <p><input type="text" placeholder="Enter Flat no....." oninput="this.className = ''" name="flat" id="flat" required></p>
        </div>
        <span style="color: red;"><?php echo $flatErr; ?></span>
        <div class="tab">Email:
            <p><input type="email" placeholder="Enter email...." oninput="this.className = ''" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></p>
        </div>
        <span style="color: red;"><?php echo $emailErr; ?></span>
        <div class="tab">Password:
            <p><input type="password" placeholder="Enter Password...." oninput="this.className = ''" name="pwd" id="pass" required></p>
        </div>
        <span style="color: red;"><?php echo $passwordErr; ?></span>
        </div>
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <input type="submit" name="regBtn" onclick="next()" value="Submit" style="background-color: #f0a73a; color:#ffffff;">
      </div>
    </div>
</div>
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
  
  <!-- Ajax Script -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

  <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>