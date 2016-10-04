<?php
//Software Engineering Group-14
//written and debugged by: Priya, Lasya, Varun
//html part written and debugged by: Kiran, Vikti
session_start();

// if(!($_SESSION['name'])){

// header("location: login.php");

// }
// ?>
<!DOCTYPE html>
<html>
<body id="bod">
<head><link rel="stylesheet" href="interface.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
<div id="dive">
<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>
<button class="b1" onclick="window.location.href='query.php'"><i class="glyphicon glyphicon-hand-left"></i>&nbsp Back</button>
<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>

<html>

    <body>
        <?php
		
		//Store the ticker symbols in tickers[] array
		 $tickers[8]='GOOG';
		 $tickers[9]='YHOO';
		 $tickers[7]='MSFT';
		 $tickers[6]='INTC';
		 $tickers[2]='CSCO';
		 $tickers[3]='C';
		 $tickers[5]='FB';
		 $tickers[1]='BAC';
		 $tickers[4]='ERIC';
		 $tickers[0]='AAPL';
		 echo '<br><br><div id="inside"><font id="pred" color="white">The current values of 10 stock prices we chose are: </font><br><br><br><br></div>';
         echo '<table align="center" border="0" style="width:40%">';		 
		//For each ticker symbol fetch the data
         for ($x = 0;$x<10;$x++)
		 {
			 //store the ticker symbol in variable id
			 $id=trim($tickers[$x]);
			 //echo "</br> Fetching data for ".$id;
			 //Fetch the URL
			 $get = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=".$id."&f=sd1t1abophgv");
             //Display Results	
			 
			//echo $get;
		 $values = str_replace("N/A",'null',$get);
		$values2 = str_replace(chr(145),"'",$values);
			 
			 //Split the string fetched using the delimiter ","
			 $original = explode(",",$get);
			 $date = $original[1];
			 $original[2] = str_replace("am","",$original[2]);
			 $original[2] = str_replace("pm","",$original[2]);
			 echo '<tr><td><font class="tckr" color="white">'.$tickers[$x].'</font></td><td><font class="tckr" color="white">$'.$original[3].'</font></td></tr>';
			 //echo "<br>".$tickers[$x]." - ";
			 //echo $original[3];
			 //echo '<div id="inside"><font id="pred" color="white">The short term predicted value of '.$ticker.' is $'.$var_name[0].'</font></div>';
			 }
             echo '</table>';
        ?>
    </body>
</html>
