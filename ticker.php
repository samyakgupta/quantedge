<?php
include './php/checksession.php';
include('./php/config.php'); 
$connection = mysqli_connect($server, $u_name, $dbpass, $dbname);
$id=mysqli_real_escape_string($connection, $_SESSION["id"]);
$query = "SELECT * FROM user_stock WHERE user_id =\"$id\"";
$result = mysqli_query($connection, $query);
?>

<html >
  <head>
    <meta charset="UTF-8">
    <title>Stock Ticker</title>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/prefixfree.min.js"></script>

  </head>

  <body>


      <?php 
          if(mysqli_num_rows($result)==0)
          {
            header("Location: ../search.php?error=05");
          }

          for ($x = 1; $x <= mysqli_num_rows($result); $x++) 
          {
          echo "
              <div id=\"Stocks$x\" class=\"Stock-container\">
                  <span class=\"Symbol\">
                    <b class=\"Stat\"><i data-replace='Symbol'></i>:<i data-replace='StockExchange'></i></b>
                    <b class=\"Label\">( <i data-replace='Name'></i> )</b>
                  </span>

                  <span class=\"Price\">
                    <b class=\"Label\">Last Price</b> 
                    <b class=\"Stat\">$<i data-replace='LastTradePriceOnly'></i></b>
                  </span>
                  
                  <span class=\"Change\">
                    <b class=\"Label\">Change</b> 
                    <b class=\"Stat\"><i data-replace='Change'></i></b> 
                    <b class=\"Stat\">(<i data-replace='ChangeinPercent'></i>)</b>
                  </span>
                  
                  <span class=\"Volume\">
                    <b class=\"Label\">Volume</b> 
                    <b class=\"Stat\" data-replace='Volume'></b>
                  </span>

                  <span class=\"MarketCapitalization\">
                    <b class=\"Label\">Mkt Cap</b> 
                    <b class=\"Stat\">$<i data-replace=\"MarketCapitalization\"></i></b>
                  </span>

                  <span class=\"LastUpdated\">
                    <b class=\"Label\">Last Trade</b> 
                    <b class=\"Stat\"><i data-replace='LastTradeDate'></i> <i data-replace=\"LastTradeTime\"></i> </b>
                  </span>
               </div> 
               ";

           } 
      ?> 
      
      
      <script src='ajax/jquery.min.js'></script>
      <script src='js/epmrgo.js'></script>
      <!-- <script src="js/index.js"></script>
      <script src="js/index3.js"></script> -->
      <script type="text/javascript" src="js/indexfunction.js"></script>
      <script type="text/javascript">
      <?php
          $c=1;
          
      while($row = mysqli_fetch_assoc($result)) 
        {
          $Symbol=mysqli_real_escape_string($connection, $row['stock_symbol']);
          
          echo "
            setup(\"#Stocks".$c."\",'".$Symbol."');
            ";
           $c++; 
        }
      ?>   
      </script>

  </body>
</html>
