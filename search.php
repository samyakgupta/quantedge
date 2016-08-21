<!DOCTYPE HTML>
<?php
include ( './php/checksession.php' );
include('./php/config.php');
unset($_SESSION['userdata']);

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
      case 04: $error = "Stock is already in DB. Add a new stock.";
      			break;
      case 05: $error = "Build a portfolio first.";
      			break;			   
      }
    }

    $sql="SELECT distinct(Sector) FROM stock_data order by Sector";
    $sql1="SELECT distinct(Industry) FROM stock_data order by Industry";
    $db = new mysqli($server, $u_name, $dbpass, $dbname);
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
								<h2 align="center">BUILD YOUR PORTFOLIO</h2>
								<p align="center">Search for the stock and add it to your portfolio.</p>
								<table>
									<form method="post" action="./php/search.php">
										<tr>
											<td><input type="text" name="name" placeholder="Name of the stock (You can enter the first few characters also)" /></td>
										</tr>

										<tr>	
											<td><select name="Industry">
												<option value="">Select the Industry</option>
											<?php	
												foreach ($db->query($sql1) as $row1)
												{	
													$Industry=$row1["Industry"];
													echo "<option value=";
													echo "\"$Industry\">";
													echo "$Industry";
													echo "</option>";
												}	
											?>		
											</select>	
											</td>
										</tr>

										<tr>
											<td><select name="Sector">
												<option value="">Select the Sector</option>
											<?php	
												foreach ($db->query($sql) as $row)
												{	
													$Sector=$row["Sector"];
													echo "<option value=";
													echo "\"$Sector\">";
													echo "$Sector";
													echo "</option>";
												}	
											?>		
											</select>	
											</td>
										</tr>	

										<tr><td align="center"></td></tr>	

										<tr>	
											<td align="center" style="vertical-align: middle;"><input type="submit" name="submit" value="Submit" /></td>
										</tr>
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
