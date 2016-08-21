<?php
include 'config.php';
session_start();
$_SESSION["atrangi"]=0;

if(isset($_POST['submit']))
{
        if(!isset($_POST['name']) || !isset($_POST['pass']))
        {
            header("Location: ../index.php?error=05");
        }
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $db = new mysqli($server, $u_name, $dbpass, $dbname);
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);
  
   if($db->connect_errno > 0)
    {
        header("Location: ../index.php?error=01");
    }
    $login = $db->prepare("SELECT id FROM user where username = ? AND password = ? ;");
    $login->bind_param('ss', $username, $password);
    if($login->execute())
    {   
        $login->bind_result($id);
        $login->fetch();
        if($id>0)
        {
            $_SESSION["username"]=$username;
            $_SESSION["id"]=$id;
            $login->close();
            $_SESSION["atrangi"] = 911;
            $db->close();
            header("Location: ../portfolio.php");
        }    
        else
        {
            session_unset();
            session_destroy();
            $db->close();
            header("Location: ../index.php?error=02");  
        }    
    }

    else
    {
        $db->close();
        header("Location: ../index.php?error=03");
    }

}


if(isset($_POST['register']))
{
    $_SESSION["atrangi"] = 911;
    header("Location: ../register.php");
}

if(isset($_POST['skip']))
{
    $_SESSION["atrangi"] = 911;
    header("Location: ../stocks.php");
}

?>