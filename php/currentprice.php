<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content=60>
    </head>
    <body>
        <?php
		//connecting to local database : change username & password accordingly.
        //deprecated
		//$connect_to_localhost = mysql_connect('localhost', 'username', 'password'); 
		$connect_to_localhost = mysqli_connect('localhost', 'root', '','webapps_group14');
		//Display Error Message of not connected to database
        if (!$connect_to_localhost){
            die('Connection unsuccessful' . mysqli_connect_error());
          }
        else
		{
			//Display connection status
            echo("Database Connection successful.</br>");
		}
		
		//Store the ticker symbols in tickers[] array
		 $tickers[0]='GOOG';
		 $tickers[1]='YHOO';
		 $tickers[2]='MSFT';
		 $tickers[3]='INTC';
		 $tickers[4]='CSCO';
		 		
		//For each ticker symbol fetch the data
         for ($x = 0;$x<5;$x++)
		 {
			 //store the ticker symbol in variable id
			 $id=trim($tickers[$x]);
			 echo "</br> Fetching data for ".$id;
			 //Fetch the URL
			 $get = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=".$id."&f=sd1t1abophgv");
             //Display Results	
echo"</br> Data fetched is: ";			 
			echo $get;
		 $values = str_replace("N/A",'null',$get);
		$values2 = str_replace(chr(145),"'",$values);
			 
			 //Split the string fetched using the delimiter ","
			 $original = explode(",",$get);
			 $date = $original[1];
			 $original[2] = str_replace("am","",$original[2]);
			 $original[2] = str_replace("pm","",$original[2]);
			 
			 $date = substr($date,1,-1);
			 //Split the string date using the delimiter "/"
			 $date_array = explode("/",$date);
			 $month = $date_array[0];
			 $day = $date_array[1];
			 $year = $date_array[2];
			 //Store the date in new format separated by "-"
		     $new_date = "$year-$month-$day";
	         $original[1] = '"'.$new_date.'"';
			 //Join the elements as a string
			 $values3 = implode(',', $original);
	
			 		//Insert the values fetched into table using SQL command
			  $insertquery = "insert into price_current(ticker,last_tran_date,last_tran_time,ask_price,bid_price,open,previous_close,days_high,days_low,volume) values(".$values3.");";
			  mysqli_query($connect_to_localhost,$insertquery) or die(mysqli_error($connect_to_localhost));
			  
			  //Display Result
			 echo "</br> Data Inserted For ".$id;
			 echo "</br>";
		 }
         echo '</br> Insertion Completed in table price_current';
		 echo "</br>";
        ?>
    </body>
</html>
