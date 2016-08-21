<?php
include('checksession.php');
include('config.php');

$connection = mysqli_connect($server, $u_name, $dbpass, $dbname);

if(isset($_POST['submit']))
{
	
	$stock = $_POST['stock'];
    $stock = mysqli_real_escape_string($connection, $stock);
    $id = mysqli_real_escape_string($connection, $_SESSION["id"]);
  
    $query ="SELECT user_id, stock_symbol FROM user_stock where user_id =\"$id\"  AND stock_symbol =\"$stock\"";
    $result = mysqli_query($connection, $query);
      $i=0;
                
      			if(mysqli_num_rows($result)>0)
                {
                     mysqli_close($connection);
                     header("Location: ../search.php?error=04");
                }
                else
                {   
                    $query1="INSERT INTO user_stock (user_id, stock_symbol) VALUES (\"$id\",\"$stock\")";
                    $result1 = mysqli_query($connection, $query1);
                    mysqli_close($connection);
                    echo 
                        '
                        <script type="text/javascript">
                        alert("Successfully added to your portfolio");
                        location = "../portfolio.php";
                        </script>
                        ';
                } 
}
    else
    {
      header("Location: ../search.php");
    }             
?>