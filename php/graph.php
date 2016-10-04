<?php

session_start();

// if(!($_SESSION['name'])){

// header("location: login.php");

// }
// ?>
<!DOCTYPE html>
<html>
<body id="bod">
<head><link rel="stylesheet" href="graph.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
<div id="dive">
<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>
<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
<script type="text/javascript">
function showcont()
{
	document.getElementById("graphinfo").style.visibility = 'visible';
}

</script>
<form id="for1" style="visibility: visible;" action="graph.php" method="get">
<h4 id="h4"> Enter the Stock Symbol </h4>
<input type="text" name="tickr" class ="in1"> </input>
<h4 id="h5"> Number of past months </h4>
<input type="text" name="nomonths" class ="in1"> </input>
<h4 id="h2">Enter The Moving Average Days you would like</h4>
<input type="text" name="ma" class="in1"> </input><br> <br>
<input type="submit" id="in2" value="Show me the Graph!" name="button" onclick="showcont()">

</form>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>

<?php

if(isset($_GET['button']))
{
$tick=$_GET['tickr'];
$months=$_GET['nomonths'];
$movav=$_GET['ma'];
//$unsafeuser_email=$_POST['email'];
//$user_email=mysql_real_escape_string($unsafeuser_email);



// echo "<h2>$months</h2>";


// echo "<h2>$movav</h2>";
$imag="http://chart.finance.yahoo.com/z?s=".$tick."&t=".$months."m&q=l&l=on&z=s&p=m".$movav."";
echo ('<img src="'.$imag.'" id="img1"  />');

unset($imag);
unset($months);
unset($movav);
}

?>
<div id="info" >
<h6 id="graphinfo" style="visibility: visible;"><span id="note">Note:</span>The X-axis shows the time period in which you chose to see the Graph. The Y-axis represents the stock price. <span id="note2"><a id="l1" href="http://www.investopedia.com/articles/active-trading/052014/how-use-moving-average-buy-stocks.asp">The moving average(MA)</a></span> is a simple technical analysis tool that smooths out price data by creating a constantly updated average price.Moving average can help cut down the amount of "noise" on a price chart and help you know the stock trend! </h6>
</div>

 



<!-- <img src="<?php echo($imag); ?>" id="img1" style="visibility: hidden"> -->

</body>
</html>