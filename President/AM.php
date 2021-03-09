<?php 
    session_start();
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
        margin-top: 100px;
      }
    </style>

</head>
<body>
    <?php 
    
    $w = $_SESSION['wing'];
    $result = mysqli_query($conn, "SELECT mid,mname,phone,wing,flat,image From tbl_member where is_approved='Pending' and wing='$w' ");  ?>
    <form action="" method="POST">
			<div class="row grid-responsive" id="tbl">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Requested Members</h3>
						</div>
						<div class="card-block" >
							<table>
								<thead>
									<tr>
                    <th scope="col" style="padding-left: 5px;">#</th>
										<th>Name</th>
										<th>Phone</th>
										<th>Wing</th>
										<th>Flat No.</th>
                    <th>Image</th>
                    <th>Approve</th>
                    <th>Reject</th>
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
            <!-- <td><?php echo '<img src="Image/user/'.$data['image'].' )."/>'; ?></td> -->
            <td style="width: 150px; height: 200;"><img src="../Image/user/<?php echo $data['image']; ?>"></td>
            <td><a href='javascript:void(0)' disabled onclick='approve(<?php echo $data['mid']; ?>)'><img src="../Image/approve.png" style="width:42px;height:42px;"></a></td>
            <td><a href='javascript:void(0)' onclick='reject(<?php echo $data['mid']; ?>)'><img src="../Image/reject.png" style="width:42px;height:42px;"></a></td>     
      <?php $i++; } ?>
              
                  </tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
        </tbody>
        </form>
        
      </table>

      

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
                  alert('approved');
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
                  alert('rejected');
              }
            });
        }

         
      </script>

</body>
</html>
