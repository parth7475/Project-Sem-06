<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="logincss.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <meta charset="UTF-8">
        <title>Edit Profile</title>
    </head>
    <body>
        <form id="editProfile" action="Edit_profile.php" method="POST">
    <h1><b style="color:#f0a73a;">Edit Profile</b></h1><br><br>
    <div class="row">
        <div class="column" >
            <div class="tab">Full Name:
                <p><input type="text" placeholder="Enter Full Name..." oninput="this.className = ''" name="name"  pattern="[A-Za-z][2,255]" title=""></p>
            </div>
            <div class="tab">Mobile Number:
                <p><input type="tel" placeholder="Enter mobile number...." oninput="this.className = ''" name="mob"  maxlength="10" minlength="10" pattern="[6789][0-9][9]" required=""></p>
            </div>
            <div class="tab">Email:
                <p><input type="email" placeholder="Enter email...." oninput="this.className = ''" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></p>
            </div>
            <div class="tab">Image:
                <p><input type="file" placeholder="select image...." oninput="this.className = ''" name="image" required="" accept="image/jpeg"></p>
            </div>
        </div>
    </div>

        
    <div style="overflow:auto;">
      <div style="float:right;">
          <input type="button" name="editBtn" id="nextBtn" onclick="next()" value="Edit"></button>
      </div>
    </div>
</div>
</form>
    </body>
</html>