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
<button class="b1" onclick="window.location.href='query.php'"><i class="glyphicon glyphicon-hand-left"></i>&nbsp Back</button>
<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome ! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>

<!DOCTYPE html>
<html>
<body>
<?php
set_time_limit(300);
echo '<br><br><div id="inside"><font id="pred" color="white">The lowest stock prices of each company in the last one year are as follows: </font><br><br><br><br></div>';
echo '<table align="center" border="0" style="width:40%">';
exec('python query4.py GOOG',$var_name1);
echo '<tr><td><font class="tckr" color="white">Google</font></td><td><font class="tckr" color="white">$'.$var_name1[0].'</font></td></tr>';
//echo "Google(GOOG) - ".$var_name1[0]."<br>";
exec('python query4.py YHOO',$var_name2);
echo '<tr><td><font class="tckr" color="white">Yahoo</font></td><td><font class="tckr" color="white">$'.$var_name2[0].'</font></td></tr>';
//echo "Yahoo(YHOO) - ".$var_name2[0]."<br>";
exec('python query4.py MSFT',$var_name3);
echo '<tr><td><font class="tckr" color="white">Microsoft</font></td><td><font class="tckr" color="white">$'.$var_name3[0].'</font></td></tr>';
//echo "Microsoft(MSFT) - ".$var_name3[0]."<br>";
exec('python query4.py INTC',$var_name4);
echo '<tr><td><font class="tckr" color="white">Intel</font></td><td><font class="tckr" color="white">$'.$var_name4[0].'</font></td></tr>';
//echo "Intel Corp.(INTC) - ".$var_name4[0]."<br>";
exec('python query4.py AAPL',$var_name5);
echo '<tr><td><font class="tckr" color="white">Apple</font></td><td><font class="tckr" color="white">$'.$var_name5[0].'</font></td></tr>';
//echo "Apple(AAPL) - ".$var_name5[0]."<br>";
exec('python query4.py FB',$var_name6);
echo '<tr><td><font class="tckr" color="white">Facebook</font></td><td><font class="tckr" color="white">$'.$var_name6[0].'</font></td></tr>';
//echo "Facebook(FB) - ".$var_name6[0]."<br>";
exec('python query4.py CSCO',$var_name7);
echo '<tr><td><font class="tckr" color="white">Cisco</font></td><td><font class="tckr" color="white">$'.$var_name7[0].'</font></td></tr>';
//echo "Cisco(CSCO) - ".$var_name7[0]."<br>";
exec('python query4.py ERIC',$var_name8);
echo '<tr><td><font class="tckr" color="white">Ericsson</font></td><td><font class="tckr" color="white">$'.$var_name8[0].'</font></td></tr>';
//echo "Ericsson(ERIC) - ".$var_name8[0]."<br>";
exec('python query4.py BAC',$var_name9);
echo '<tr><td><font class="tckr" color="white">Bank of America</font></td><td><font class="tckr" color="white">$'.$var_name9[0].'</font></td></tr>';
//echo "Bank of America(BAC) - ".$var_name9[0]."<br>";
exec('python query4.py C',$var_name10);
echo '<tr><td><font class="tckr" color="white">Citi</font></td><td><font class="tckr" color="white">$'.$var_name10[0].'</font></td></tr>';
//echo "Citi(C) - ".$var_name10[0]."<br>";

echo '</table>';
?>

</body>
</html>