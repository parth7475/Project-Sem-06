<?php 
	session_start();
	include_once '../links.php';

	if($_SESSION['mid'] == "")
	{
		header("location:../Home.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>President Dashboard</title>
	
	<!-- Google Fonts -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet"> -->
	
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/milligram.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	
	<style>
	</style>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div class="navbar">
		<div class="row">
			<div class="column column-30 col-site-title"><a href="#" class="site-title float-left">Dashboard</a></div>
			<!-- <div class="column column-30 col-site-title"><a href="#" class="site-title float-right	">Dashboard</a></div> -->


			<div class="column column-15" id="user">
				<div class="user-section"><a href="#">
					<img src="http://via.placeholder.com/50x50" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
					<div class="username">
						<h4><?php echo $_SESSION['mname']; ?></h4>
						<p>President</p>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div id="sidebar" class="column">
			<h5>Navigation</h5>
			<ul>
				<li><a href="<?php echo $PreDash; ?>"><em class="fa fa-home"></em> Home</a></li>
				<li><a href="<?php echo $AddMember; ?>"><em class="fa fa-user-plus"></em>Add Member</a></li>
				<li><a href="#widgets"><em class="fa fa fa-clone"></em> Widgets</a></li>
				<li><a href="#forms"><em class="fa fa-pencil-square-o"></em> Forms</a></li>
				<li><a href="#alerts"><em class="fa fa-warning"></em> Alerts</a></li>
				<li><a href="#buttons"><em class="fa fa-hand-o-up"></em> Buttons</a></li>
				<li><a href="#tables"><em class="fa fa-table"></em> Tables</a></li>
				<li><a href="#grid"><em class="fa fa-columns"></em> Grid</a></li>
				<li><a href="<?php echo $LogOut; ?>"><em class="fa fa-columns"></em> Logout </a></li>

			</ul>
		</div>
	</div>

	

					
</body>
</html> 