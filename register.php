<!DOCTYPE HTML>
<?php
include ( 'php/checksession.php' );

$error = "";
  if(isset($_GET["error"]))
    {
      switch($_GET["error"])
      {
      case 01: $error = "Username already in use. Please select a different username.";
          		break;	
      case 02: $error = "Couldn't register the user.Please try again";
      			break;      
      }
    }
?>
<html>
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/961160A506AE58C231477C4C7B303E8D"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/232.png" /></a></div>
				
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<header id="header" class="alt">
				<nav>
					<form method="post" action="./index.php">
						<tr style="text-align: center; background-color: rgba(0,0,0,0);">
								<td><input type="submit" name="submit" value="Home" /></td>
					</form>
				</nav>
				</header>

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<p style="color:red;"><?php echo $error ?></p>
								<h2 align="center">REGISTER</h2>
								<p align="center">Register and create your own portfolio to track and analyze stocks</p>
								<table>
									<form method="post" action="./php/php_register.php">
										<tr>
											<td><input type="text" name="username" placeholder="Desired Username" required /></td>
										</tr>
										<tr>		
											<td><input type="Password" name="password" placeholder="Password" required/></td>
										</tr>
										<tr>	
											<td><input type="text" name="mobile" pattern="[789][0-9]{9}" placeholder="Phone Number" required/></td>
										</tr>
										<tr>
											<td><input type="email" name="email" placeholder="E-mail Address" required/></td>
										</tr>
										<thread>	
											<td style="vertical-align: middle;"><input type="submit" name="submit" value="Submit" /></td>
										</thread>
									</form>
								</table>
							</div>
						</header>
					</section>
			</div>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
