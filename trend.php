<?php
include('./php/config.php'); 
$connection = mysqli_connect($server, $u_name, $dbpass, $dbname);
$id=1;
$query1 = "SELECT stock_symbol FROM user_stock WHERE user_id =\"$id\"";
$result1 = mysqli_query($connection, $query1);
?>


<?php
if(mysqli_num_rows($result1)==0)
          {
            echo "No data in user_stock";
          }

while($row1 = mysqli_fetch_assoc($result1)) 
{
        $Symbol=$row1['stock_symbol'];




        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-01-01\" and endDate = \"2015-01-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="January";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  
                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query); 
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }  





        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-02-01\" and endDate = \"2015-02-28\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="February";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

               $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);              
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }



        




        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-03-01\" and endDate = \"2015-03-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="March";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);   
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }


        





        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-04-01\" and endDate = \"2015-04-30\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="April";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);  
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }

        




        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-05-01\" and endDate = \"2015-05-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="May";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }

        



        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-06-01\" and endDate = \"2015-06-30\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="June";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }






       $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-07-01\" and endDate = \"2015-07-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="July";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }






        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-08-01\" and endDate = \"2015-08-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="August";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }





        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-09-01\" and endDate = \"2015-09-30\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="September";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }




        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-10-01\" and endDate = \"2015-10-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="October";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }






        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-11-01\" and endDate = \"2015-11-30\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="November";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

               $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }






        $yql_query = urlencode("select * from yahoo.finance.historicaldata where startDate = \"2015-12-01\" and endDate = \"2015-12-31\" and symbol = \"$Symbol\"");  
        $yql_query_url="http://query.yahooapis.com/v1/public/yql?env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json&q=".$yql_query;

          $x="December";
          // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object 
            $phpObj=json_decode($json);

         if(!is_null($phpObj->query->results))
          {
            foreach($phpObj->query->results->quote as $quote)
            {  

                $Change = $quote->Close - $quote->Open;
                if($Change < 0)
                {
                  $Change_trend="Decrease";
                }
                else
                {
                  $Change_trend="Increase";
                }

                $query  = "INSERT INTO history_price_data (";
                $query .= "  Symbol, month, close_price, change_trend";
                $query .= ") VALUES (";
                $query .= "  '{$Symbol}', '{$x}', {$quote->Close}, '{$Change_trend}'";
                $query .= ")";
                $result = mysqli_query($connection, $query);    
            
            }
          }
      
      else  
      {
        echo "Couldnt fetch";
      }
}   


// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$result = mysqli_query($connection, "SELECT * FROM history_price_data");


$csv_export.= '"Symbol","month","close_price","change_trend"';
$csv_export.= '
';
$csv_export.= '"STRING","STRING","NUMERIC","STRING"';


// loop through database query and fill export variable
while($row = mysqli_fetch_assoc($result)) 
{
  // create line with field values
$csv_export.= '
';
  $csv_export.= '"'.$row['Symbol'].'","'.$row['month'].'","'.$row['close_price'].'","'.$row['change_trend'].'"';  
}

$file = fopen("test.csv","w");
fwrite($file,$csv_export);
fclose($file);
  
?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>
