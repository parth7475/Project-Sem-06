<?php 
    include_once '../Connection.php';
    include_once 'President_Dashboard.php';

    if($_SESSION['mid'] == "")
    {
        header("location:../Home.php");
    }
    // include_once ' Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php $result = mysqli_query($conn, "SELECT mid,mname,phone,wing,flat,image From tbl_member where is_approved='Pending'");  ?>
    <form action="" method="POST">
    <table style="margin-left: 100px; margin-top: 250px;" id="userTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Wing</th>
            <th scope="col">Flat No.</th>
            <th scope="col">Image</th>
            <th scope="col">Approved</th>
            <th scope="col">Rejected</th>
          </tr>
        </thead>
          <?php  
            $i = 1;
            $approve_list = array();
            $reject_list = array();
            while($data = mysqli_fetch_array($result))
            {
          ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <?php $mid=$data['mid']; ?>
            <td><?php echo $data['mname']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['wing']; ?></td>
            <td><?php echo $data['flat']; ?></td>
            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['image'] ).'"/>'; ?></td>    
            <?php echo '<td><input type="submit" style="border-radius: 15px; font-weight: bold; height: 45px; width: 120px; background-color:#68E434; font-family:Raleway;" name="btnApprove'.$i.'" value="Approve"></td>';
            echo '<td><input type="submit" style="border-radius: 15px; font-weight: bold; height: 45px; width: 120px; background-color: #ff0000; font-family:Raleway;" value="Reject" name="btnReject"></td>';
             array_push($approve_list,'btnApprove'.$i);
             array_push($reject_list,'btnReject'.$i); 
            ?>
          </tr>
        </tbody>
        </form>
        <?php 
              $i++;
              // echo $approve_list[$i-2];
              // echo $reject_list[$i-2];
            } 

        ?>
        
        <?php
              // $k = 0;
              // for($approve_list as $k)
              // {

              // } 
              // if(isset($_REQUEST['btnApprove']))
              // {
              //     mysqli_query($conn, "update tbl_member set is_approved='Approved' where mid =".$mid);    
              // }

              // if(isset($_REQUEST['btnReject']))
              // {
              //     mysqli_query($conn, "update tbl_member set is_approved='Rejected' where mid =".$mid);    
              // }
        ?>
      </table>

      <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
      </script>

</body>
</html>
