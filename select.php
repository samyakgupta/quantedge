<?php
include 'php/checksession.php';
$error = "";
  if(isset($_GET["error"]))
    {
      switch($_GET["error"])
      {
      case 01: $error = "Please enter data.";
          break;
      case 02: $error = "Try Again.";
          break;
      case 03: $error = "Invalid stock name or wrong selection of options.";
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

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<?php include_once("header_menu.php"); ?>

				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<p style="color:red;"><?php echo $error ?></p>
								<h2 align="center">SELECT A STOCK</h2>
								<p align="center">Select a stock to add to your portfolio.</p>
								<table>
									<tr>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Symbol</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Name</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Market Cap</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Sector</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Industry</th>
										<th style="vertical-align: middle; text-align: center; padding: 0.6em; background-color: rgba(255,255,255,0.15);">Click To Select</th>
									</tr>
									<!--Run this form in a loop fetching data of all matching db entries-->
									<?php
										foreach ($_SESSION['userdata'] as $row) {
											echo '
											<form method="post" action="./php/selection.php">
												<tr>
													<td style="vertical-align: middle; text-align: center;">'.$row['Symbol'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row['Name'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row['MarketCap'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row['Sector'].'</td>
													<td style="vertical-align: middle; text-align: center;">'.$row['Industry'].'</td>
                                                    <input type="hidden" name="stock" value="'.$row['Symbol'].'">													
													<td style="vertical-align: middle; text-align: center; float: right;"><input type="submit" name="submit" value="Add"/></td>
												</tr>
											</form>';
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
