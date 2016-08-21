<?php 
include('checksession.php');
if(isset($_POST['submit1'])) 
    {	
    	header("Location: ../search.php");
    }

else if(isset($_POST['submit2'])) 
    {	
    	header("Location: ../search.php?error=01");
    }

else if(isset($_POST['submit3'])) 
    {	
    	header("Location: ../ticker.php?");
    }

else if(isset($_POST['submit4'])) 
    {	
    	header("Location: ../stocks.php");
    }   

else if(isset($_POST['submit5'])) 
    {	
    	header("Location: ../index.php");
    }            	