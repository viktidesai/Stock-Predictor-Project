<?php

$initiate_conn=mysqli_connect('localhost', 'root', '','webapps_group14');      //to initiate connection to myphpadmin in order to use sql 
if(!$initiate_conn)                                                            //if not connected
{
	echo("Connection to the SQL server failed");
}
else
	echo("Connection successful</br>");

$prev_date=date("m-d-y",mktime(0, 0, 0, 2, 28, 2015));                       //set the time to 0 and date to year back or preferred date
$current_date=date("m-d-y");

$pr_date=explode("-",$prev_date);
$crnt_date=explode("-",$current_date);

echo("Current date is:". $crnt_date[0]."/".$crnt_date[1]."/".$crnt_date[2]."</br>");                //displays the current and previous dates
echo("Previous date is:".$pr_date[0]."/".$pr_date[1]."/".$pr_date[2]."</br>");
	
			 $id="GOOG";                          //change the ticker symbol

$get="http://ichart.finance.yahoo.com/table.csv?s=".$id."&d=".$crnt_date[0]."&e=".$crnt_date[1].
			"&f=".$crnt_date[2]."&g=d&a=".$pr_date[0]."&b=".$pr_date[1]."&c=".$pr_date[2].'&ignore=.csv';     

$curl=curl_init();			                                      //initializes a new session and return a cURL handle
$file_name=($id."_Historyvalues.csv");                          
$fp=fopen($file_name,"w");                                        //opens a .csv file to store the data 
curl_setopt($curl, CURLOPT_URL, $get);                            //sets an option for cURL transfer
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_exec($curl);                                                 //executes the session
curl_close($curl);												  //closes the session ,frees all resources and also deletes the curl handle
fclose($fp);

$values= file($file_name);                                       //specifies path of file to read
for($a = 1;$a<sizeof($values);$a++)
{
	$single_line=trim($values[$a]);                              //remove the specified characters from a string
	$original = explode(',',$single_line);                       //breaks a string at ',' 
	$modified = "'".$id."','".implode("','",$original)."'";		  //attaches the id and joins the elements of a string
	// to insert the values of the file into the table price_history created in  the database
	
$add_query="insert into price_history(ticker,price_date,open_price,high_price,low_price,close_price,volume,adj_close_price,created_date) values(".$modified.",now());";
mysqli_query($initiate_conn,$add_query) or die(mysqli_error($initiate_conn));  //performs the query against database

}
echo("Inserted into Table price_history");
?>

