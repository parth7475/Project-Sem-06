<?php ob_start(); ?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MySociety</title>

<!--	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/header-login-signup.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>-->
<style>
    @import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700');

html{
	background-color: #eaf0f2;
}

body{
	font:24px/1.5 Arial, Helvetica, sans-serif;
	padding:0;
	margin:0;   
}

.menu{
	text-align: center;
	padding-top: 25px;
	margin-bottom:200px;
}

.menu img{
	opacity: 0.4;
	margin: 20px auto;
}

.menu h1{
	margin-top:0;
	font: normal 50px/1.5 'Open Sans', sans-serif;
	color: #3F71AE;
	padding-bottom: 16px;
}
.menu ul {
	max-width: 600px;
	margin: 60px auto 0;
}

.menu ul a{
	text-decoration: none;
	color: #FFF;
	text-align: left;
	background-color: #B9C1CA;
	padding: 10px 16px;
	border-radius: 2px;
	opacity: 0.8;
	font-size: 16px;
	display: inline-block;
	margin: 4px;
	line-height: 1;
	outline: none;

	transition: 0.2s ease;
}

.menu ul li a.active{
	background-color: #66B650;
	pointer-events: none;
}

.menu ul li a:hover {
	opacity: 1;
}

.menu ul{
	list-style: none;
	padding: 0;
}

.menu ul li{
	display: inline-block;
}
.header-login-signup{
	background-color:#101820FF;
	box-shadow:0 1px 1px #ccc;
	padding: 20px 40px;
	height: 80px;
	color: #ffffff;
	box-sizing: border-box;
}

.header-login-signup .header-limiter {
	max-width: 1200px;
	text-align: center;
	margin: 0 auto;
}

/* Logo */

.header-login-signup .header-limiter h1{
	float: left;
	font: normal 50px Cookie, Arial, Helvetica, sans-serif;
	line-height: 40px;
	margin: 0;
}

.header-login-signup .header-limiter h1 span {
	color: #35cebe;
}

/* The navigation links */

.header-login-signup .header-limiter a {
	color: #ffffff;
	text-decoration: none;
}

.header-login-signup .header-limiter nav {
	font:16px Arial, Helvetica, sans-serif;
	line-height: 40px;
	float: left;
	margin: 0 0 0 60px;
	padding: 0;
}

.header-login-signup .header-limiter nav a{
	font-size: 14px;
	display: inline-block;
	padding: 0 5px;
	opacity: 0.9;
	text-decoration:none;
	line-height: 1;
}

.header-login-signup .header-limiter nav a:hover {
	opacity: 1;
}

.header-login-signup .header-limiter nav a.selected {
	color: #608bd2;
}

/* Login/Sign up buttons */

.header-login-signup .header-limiter ul {
	font: 14px Arial, Helvetica, sans-serif;
	list-style: none;
	line-height: 1;
	float: right;
}

.header-login-signup .header-limiter ul li {
	display: inline-block;
	margin-left: 15px;
	opacity:0.9;
}

.header-login-signup .header-limiter ul li:hover{
	opacity: 1;
}

/* The sign up button */

.header-login-signup .header-limiter ul li:last-child a {
	font-weight: bold;
	background-color: #3a3c3e;
	padding: 10px 15px;
	border-radius: 3px;
}

/* Making the header responsive */

@media all and (max-width: 600px) {

	.header-login-signup {
		padding: 25px;
		height: 85px;
	}

	.header-login-signup .header-limiter h1 {
		float: none;
		margin: -8px 0 2px;
		text-align: center;
		font-size: 24px;
		line-height: 1;
	}

	.header-login-signup .header-limiter nav {
		margin: 0;
		float: none;
	}

	.header-login-signup .header-limiter nav li a {
		font-size: 20px;
	}

	.header-login-signup .header-limiter ul {
		display: none;
	}

}

/* For the headers to look good, be sure to reset the margin and padding of the body */

body {
	margin:0;
	padding:0;
}
</style>
</head>

<body>

<header class="header-login-signup">

	<div class="header-limiter">

		<h1><a href="#">My<span>Society</span></a></h1>

		<nav>
                    <a href="Home.php" style="font-size: 25px;" class="selected">Home</a>
					<a href="#" style="font-size: 25px;" class="selected">About Us</a>
					<a href="#" style="font-size: 25px;" class="selected">Contact Us</a>
					<a href="#" style="font-size: 25px;" class="selected">Service</a>
		</nav>

		<ul>
			<li><a href="../Project/Login.php">Login</a></li>
			<li><a href="../Project/Registration/Registration.php">Sign up</a></li>
		</ul>

	</div>

</header>

</body>

</html>