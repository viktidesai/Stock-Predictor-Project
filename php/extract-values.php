<?php
//Software Engineering Group-14
$connect_to_localhost = mysqli_connect('localhost', 'root', '','webapps_group14');
        if (!$connect_to_localhost){
            die('Connection unsuccessful' . mysqli_connect_error());
          }
        else
            echo("Database Connection successful.</br>");
			//$sql="SELECT ticker,last_tran_date,last_tran_time,ask_price FROM price_current ORDER BY ticker";
$file_name=("Current values extracted.csv");                          
$fp=fopen($file_name,"w");
$result=array();
$row=array();
 $result = mysqli_query($connect_to_localhost,"SELECT * FROM `price_current` ");
  while($row= mysqli_fetch_array($result))
  {
     fwrite($fp,$row[`ticker`]."\t".$row[`last_tran_date`]."\t".$row[`last_tran_time`]."\t".$row[`ask_price`]."\t". $row[`bid_price`]."\t".$row[`open`]."\t".$row[`previous_close`]."\t". $row[`days_high`]."\t".$row[`days_low`]."\t".$row[`volume`]."\n");
  } 
  fclose( $fp );
/*while(1)
{ echo("Entered loop");
$result=mysqli_query($connect_to_localhost,$sql);
  while ($row=mysqli_fetch_object($result))
    {  
      $row[0]->$file_name;
	  $row[1]->$fp;
	  echo("Successful insertion");
    }
  // Free result set
  //mysqli_free_result($result);
}*/
?>