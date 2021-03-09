<?php 
  session_start();
  include_once '../Connection.php';
  include_once '../other/validation.php';
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
        $folder = "../Image/user/".$filename; 

        $path    = '../Image/user';
        $files = array_diff(scandir($path), array('.', '..'));

        foreach($files as $fname)
        { 
            if(strcmp($fname,$filename) == 0)
            {
              $value = explode(".",$filename);    
              $rndno = rand(100,999);
              $filename = $value[0].$rndno.'.'.$value[1];
              $folder = "../Image/user/".$filename;
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
        
        if($insert)
        {
          header("location:Registration.php");
        }
}
      


?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="../css/logincss.css" rel="stylesheet">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<form id="regForm" action="#" method="POST" enctype="multipart/form-data">
    <h1><b style="color:#35cebe;">Registration</b></h1><br><br>
    <div class="row">
        <div class="column" >
        <div class="tab">Full Name:
        <p><input type="text" placeholder="Enter Full Name..." oninput="this.className = ''" name="name" id="user" title="Name" required></p>
        </div>
        <span style="color: red;"><?php echo $nameErr; ?></span>
        <div class="tab">Mobile Number:
        <p><input type="tel" placeholder="Enter mobile number...." oninput="this.className = ''" name="mob" title="Eight or more characters" maxlength="10" minlength="10" required></p>
        </div>
        <span style="color: red;"><?php //echo $ContactnoErr; ?></span>
        <div class="tab">Image:
            <p><input type="file" placeholder="select image...." oninput="this.className = ''" name="image" id="image" /></p>
        </div>
        
        
        <div class="tab" style="margin-bottom: 15px;">State:
            <select name="state" id="state_dropdown">
                <option>SELECT STATE</option>
                <?php
                  $records = mysqli_query($conn, "SELECT * From tbl_state");  // Use select query here 

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['stid'] ."'>" .$data['sname'] ."</option>";  // displaying data in option menu
                  }	
                ?>
            </select>
          </div>

        <div class="tab" style="margin-bottom: 15px;">City:
            <select name="city" id="city_dropdown">
              <!-- <option>--Select your City--</option> -->
            </select>
        </div>

        <div class="tab" style="margin-bottom: 15px;">Landmark:
            <select name="landmark" id="landmark_dropdown" onselect="myFunction()">
              <!-- <option>--Select your Landmark--</option> -->
            </select>
        </div>
        </div>

        <div class="column">
        <div class="tab" style="margin-bottom: 15px;">Society:
              <select name="soc" id="society_dropdown">
                  <!-- <option>--Select your Society--</option>  -->
              </select>
        </div> 

        <div class="tab">Wing:
            <p><input type="text" placeholder="Enter wing...." oninput="this.className = ''" name="wing" id="wing" required></p>
        </div>
        <span style="color: red;"><?php echo $wingErr; ?></span>
        <div class="tab">Flat No.:
            <p><input type="number" placeholder="Enter Flat no....." oninput="this.className = ''" name="flat" id="flat" required></p>
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
        <input type="submit" name="regBtn" onclick="next()" value="Submit" style="background-color: #35cebe; color:#ffffff;">
      </div>
    </div>
</div>
</form>

  <script>
    
  $(document).ready(function ()
  {
        // Getting Cities
        $('#state_dropdown').on('change', function() {
              // alert( this.value );
              $("#city_dropdown").html("<option value=''>SELECT CITY</option>");
              $.ajax({
                  url: "./Get_City.php",
                  type: 'post',
                  data: { "id": $("#state_dropdown").val()},
                  success: function(result){
                    // alert(result);
                    var str = "<option value=''>SELECT CITY</option>";
                    $.each(result,function(key,value) {
                        str = str + "<option value='" + value.id + "'>" + value.name + "</option>";
                    });
                    $("#city_dropdown").html(str);
                },
                error: function(err) {
                    alert(err.responseText);
                }
            });
       });


        // Getting Landmarks
        $('#city_dropdown').on('change', function() {
                    // alert( this.value );
                    $("#landmark_dropdown").html("<option value=''>SELECT LANDMARK</option>");
                    $.ajax({
                        url: "./Get_Landmark.php",
                        type: 'post',
                        data: { "id": $("#city_dropdown").val()},
                        success: function(result){
                          // alert(result);
                          var str = "<option value=''>SELECT LANDMARK</option>";
                          $.each(result,function(key,value) {
                              str = str + "<option value='" + value.id + "'>" + value.name + "</option>";
                          });
                          $("#landmark_dropdown").html(str);
                      },
                      error: function(err) {
                          alert("error");
                      }
                  });
        });


        // Getting Societies
        $('#landmark_dropdown').on('change', function() {
              // alert( this.value );
              $("#society_dropdown").html("<option value=''>SELECT SOCIETY</option>");
              $.ajax({
                  url: "./Get_Society.php",
                  type: 'post',
                  data: { "id": $("#landmark_dropdown").val()},
                  success: function(result){
                    // alert(result);
                    var str = "<option value=''>SELECT SOCIETY</option>";
                    $.each(result,function(key,value) {
                        str = str + "<option value='" + value.id + "'>" + value.name + "</option>";
                    });
                    $("#society_dropdown").html(str);
                },
                error: function(err) {
                    alert("error");
                }
            });
        });
  });  


    function next()
    {
      var inp = document.getElementsByTagName("input");
      // var y = document.getElementById("user");

      var i,blank=0;
      for(i=0;i<inp.length;i++)
      {
        if(inp[i].value == "")
        {
          inp[i].classList.add("invalid");
          blank=1;
        }
      }

      if(blank == 0)
      {
        alert("We will send your registration status on your registered email within 2 days !! ");  
      }


    }


  </script>
  

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>