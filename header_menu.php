<header id="header" class="alt">
						<nav>
							<a href="#menu"><?php echo $_SESSION["username"]."'s Menu"; ?></a>
						</nav>
					</header>

					<nav id="menu">
						<div class="inner">
							<h2><?php echo $_SESSION["username"]."'s Portfolio"; ?></h2>
							<table style="width: 100%;border-collapse: unset;">
								<form method="post" action="./php/header_menu.php">

									<tr style="text-align: center; background-color: rgba(0,0,0,0);">
										<td><input type="submit" name="submit1" value="Add Stocks" /></td>
									</tr>

									<tr style="text-align: center; background-color: rgba(0,0,0,0);">
										<td><input type="submit" name="submit2" value="View Portfolio" /></td>
									</tr>

									<tr style="text-align: center; background-color: rgba(0,0,0,0);">
										<td><input type="submit" name="submit3" value="Realtime Data" /></td>
									</tr>

									<tr style="text-align: center; background-color: rgba(0,0,0,0);">
										<td><input type="submit" name="submit4" value="Toolbox" /></td>
									</tr>

									<tr style="text-align: center; background-color: rgba(0,0,0,0);">
									<td><input type="submit" name="submit5" value="Logout" /></td>

								</form>
							</table>
							<a href="#" class="close">Close</a>
						</div>
					</nav>