<?php 
   include_once './Admin_Dashboard.php'; 
   include_once '../Connection.php';
  //  include_once '../links.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="../css/logincss.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/milligram.min.css">
	<link rel="stylesheet" href="../css/styles.css">

  <style>
    html{
      font-family: Raleway;
      background-color: #f7f2dfe7;
    }

    body{
      background-color: #f7f2dfe7;
    }


  </style>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    
  <?php 
    if(isset($_REQUEST['btnAddSoc']))
    {
        // echo "<br><br><br><br><br><br><br><br><br><br><br><h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$_REQUEST['addr']."</h1>";
        // echo "<script>alert(".$_REQUEST['sname'].");</script>";
        // echo "<script>console.log(".$_REQUEST['sname'].");</script>";

        $sname = $_POST['sname'];
        $addr = $_REQUEST['addr'];
        $pincode = $_REQUEST['pin'];
        $stateid = $_REQUEST['state'];
        $cityid = $_REQUEST['city'];
        $landmarkid = $_REQUEST['landmark'];
        $txtLandmark = $_REQUEST['lmark'];

        if($landmarkid != null)
        {
          $query = "insert into tbl_society (sname,address,pincode,lid,cid,stid) values ('$sname','$addr',$pincode,$landmarkid,$cityid,$stateid)";
          $insert = mysqli_query($conn,$query);

        }
        else
        {
          $query = "insert into tbl_landmark (cid,landmark) values ($cityid,'$txtLandmark')";
          $insert = mysqli_query($conn,$query);
        
          $query2 = "insert into tbl_society (sname,address,pincode,lid,cid,stid) values ('$sname','$addr',$pincode,(select lid from tbl_landmark where landmark = ".$txtLandmark."),$cityid,$stateid)";
          $insert2 = mysqli_query($conn,$query2);
        }  
    }
  ?>
<form id="lgForm" action="" method="POST">
        <h3><b style="color:#35cebe;">ADD SOCIETY</b></h3>
        <div class="tab">Society Name:
          <p><input type="text" placeholder="Enter society name..." oninput="this.className = ''" name="sname" id="sname"></p>
        </div>
        <div class="tab">Address:
          <p><textarea name="addr" id="addr" placeholder="Enter Address...."></textarea></p>
        </div>
        <div class="tab">Pincode:
          <p><input type="text" placeholder="Enter pincode..." oninput="this.className = ''" name="pin" id="pin"></p>
        </div>
        <div class="tab" style="margin-bottom: 15px;">State:<br>
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

            <div class="tab" style="margin-bottom: 15px;">City:<br>
                <select name="city" id="city_dropdown">
                  <!-- <option>--Select your City--</option> -->
                </select>
            </div>

            <div class="tab" style="margin-bottom: 15px;">Select landmark (if exist):<br>
                <select name="landmark" id="landmark_dropdown" onselect="myFunction()">
                  <!-- <option>--Select your Landmark--</option> -->
                </select>
            </div>
            <h2><center>OR</center></h2>
            <div class="tab">Landmark:
              <p><input type="text" placeholder="Enter landmark..." oninput="this.className = ''" name="lmark" id="lmark"></p>
            </div>
        <div style="overflow:auto;">
          <div style="float:right;">
            <input type="submit" value="ADD" name="btnAddSoc" onclick="sub()" style="background-color:#35cebe; font-size:15px; color:#ffffff;">
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
                      url: "../Registration/Get_City.php",
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
                            url: "../Registration/Get_Landmark.php",
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
                      // disableTxt();
            });

            $('#landmark_dropdown').on('click', function() { 
              document.getElementById("lmark").disabled = true;
            });

            $('#lmark').on('click', function() { 
              document.getElementById("landmark_dropdown").disabled = true;
            });

            // function disableTxt() {
            //   document.getElementByName("lmark").disabled = true;
            // }
            // Getting Societies
            // $('#landmark_dropdown').on('change', function() {
            //       // alert( this.value );
            //       document.getElementByName("lmark").disabled = true;
            //       $("#society_dropdown").html("<option value=''>SELECT SOCIETY</option>");
            //       $.ajax({
            //           url: "../Registration/Get_Society.php",
            //           type: 'post',
            //           data: { "id": $("#landmark_dropdown").val()},
            //           success: function(result){
            //             // alert(result);
            //             var str = "<option value=''>SELECT SOCIETY</option>";
            //             $.each(result,function(key,value) {
            //                 str = str + "<option value='" + value.id + "'>" + value.name + "</option>";
            //             });
            //             $("#society_dropdown").html(str);
            //         },
            //         error: function(err) {
            //             alert("error");
            //         }
            //     });
            // });
      });

      function sub()
      {
        swal('Added Successfully');
      }
  </script>                  
</body>
</html>