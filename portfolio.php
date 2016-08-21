<?php
include './php/checksession.php';
include('./php/config.php'); 
$connection = mysqli_connect($server, $u_name, $dbpass, $dbname);
$id=mysqli_real_escape_string($connection, $_SESSION["id"]);
$query = "SELECT * FROM user_stock WHERE user_id =\"$id\"";
$result = mysqli_query($connection, $query);
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

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<?php include_once("header_menu.php"); ?>

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2 align="center"><?php echo $_SESSION["username"]."'s PORTFOLIO"; ?></h2>
								<p align="center">The following stocks are in your portfolio.</p>
								<table>
									<tr>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Symbol</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Name</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Sector</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Industry</th>
									</tr>
									<!--Run this form in a loop fetching data of all matching db entries-->
									<?php
										 while($row = mysqli_fetch_assoc($result)) 
										 {
										 	$Symbol=mysqli_real_escape_string($connection, $row['stock_symbol']);
										 	$query1= "SELECT * FROM stock_data WHERE Symbol =\"$Symbol\"";
										 	$result1 = mysqli_query($connection, $query1);
										 	$row1 = mysqli_fetch_assoc($result1);

											echo 
											'
												<tr>
													<td style="vertical-align: middle; text-align: center;">'.$row1['Symbol'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row1['Name'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row1['Sector'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row1['Industry'].'</td>
												</tr>
											';
										}
									?>
									<!--loop till here-->
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
