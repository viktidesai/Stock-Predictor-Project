<?php
//Software Engineering Group-14
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
<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome ! </button>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
</div> 
<form id= "f1" action="predict.php" method="post">

<br><br><br>
<div id="co">
<label id="comp" for="company">COMPANY</label>
<br>
<select name="company" class="b2">
<option value="AAPL">Apple</option>
<option value="BAC">Bank of America</option>
<option value="CSCO">Cisco</option>
<option value="C">Citi</option>
<option value="ERIC">Ericsson</option>
<option value="FB">Facebook</option>
<option value="GOOG">Google</option>
<option value="INTL">Intel</option>
<option value="MSFT">Microsoft</option>
<option value="YHOO">Yahoo</option>
</select>
</div>
<div id="d02">
<h6 id="hpred">How do you want it to be predicted?</h6>
<input type="submit" value="Current Prediction" id="but3" name="short"/>
<input type="submit" value="5-Day Prediction" id="but2" name="long"/>
</form>
</div>
</body>
</html>

<?php
//global $ticker=0;
if(isset($_POST['short']))
{
$ticker=$_POST['company'];
exec('python bayesian.py '.$ticker.'',$var_name);
echo '<div id="inside"><font id="pred" color="white">The current next-minute predicted value of '.$ticker.' is $'.$var_name[0].'</font></div>';

$subject="<html> Curent Prediction for " .$ticker." </html>";
$txt= "Thanks for visiting the website! The following is our prediction for 5 days just in case you forget ".$ticker. " would likely have prices of" .$var_name[0]. " $";



$to = "kiranjatty37@gmail.com";

$headers = "From:contactus@stalkthestock.com";

mail($to,$subject,$txt,$headers);
//echo $var_name[0]."\t";
}
if(isset($_POST['long']))
{
$ticker=$_POST['company'];
exec('python analyzer2.py '.$ticker.'',$var_name1);
//echo "The predicted values for the next 5 days are as follows: "."<br>";
echo '<div id="inside"><font id="pred" color="white" font-style="italic">The long term predicted value of '.$ticker.' for 5 days are $'.$var_name1[0].', $'.$var_name1[1].', $'.$var_name1[2].', $'.$var_name1[3].', $'.$var_name1[4].'</font></div>';
$subject="<html> Five Day Prediction for " .$ticker." </html>";
$txt= "Thanks for visiting the website! The following is our prediction for 5 days just in case you forget ".$ticker. " would likely have prices of" .$var_name1[0]. ", $" .$var_name1[1].", $" .$var_name1[2].", $" .$var_name1[3].", $" .$var_name1[4]." USD";




$to = "kiranjatty37@gmail.com";

$headers = "From:contactus@stalkthestock.com";

mail($to,$subject,$txt,$headers);
}

//echo $ticker;
//$hello=$c;
?>

