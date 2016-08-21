<?php 
include('checksession.php');
include('config.php'); 

$connection = mysqli_connect($server, $u_name, $dbpass, $dbname);

    if(isset($_POST['submit'])) 
    {	

      $Industry=mysqli_real_escape_string($connection, $_POST['Industry']);
      $Sector=mysqli_real_escape_string($connection, $_POST['Sector']);
      $name=mysqli_real_escape_string($connection, $_POST['name']);

			if($Sector=="" && $name=="" && $Industry=="")
			{
				header("Location: ../search.php?error=01");
			}
			else if (!($Sector=="") && ($name=="") && !($Industry==""))
			{
				$query = "SELECT * FROM stock_data WHERE sector=\"$Sector\" and industry=\"$Industry\"";
			}
      else if (!($Sector=="") && !($name=="") && ($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE sector=\"$Sector\" and name like \"$name%\"";
      }
      else if(($Sector=="") && !($name=="") && !($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE industry=\"$Industry\" and name like \"$name%\"";
      }
      else if(!($Sector=="") && !($name=="") && !($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE industry=\"$Industry\" and name like \"$name%\"";
      }
      else if (!($Sector=="") && ($name=="") && ($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE sector=\"$Sector\"";
      }
      else if (($Sector=="") && ($name=="") && !($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE industry=\"$Industry\"";
      }
      else if (($Sector=="") && !($name=="") && ($Industry==""))
      {
        $query = "SELECT * FROM stock_data WHERE name like \"$name%\"";
      }
      else
      {
        header("Location: ../search.php?error=02");
      }
      
      $result = mysqli_query($connection, $query);
      $i=0;
                
      if(mysqli_num_rows($result)>0)
                  {
                     while($row = mysqli_fetch_assoc($result))
                       {
                            $_SESSION['userdata'][$i++] = $row;
                       }
                     mysqli_close($connection);
                     header("Location: ../select.php");
                  }
                  else
                  {   
                    header("Location: ../search.php?error=03");
                  } 
    }
    else
    {
      header("Location: ../search.php");
    }              
  
?>
