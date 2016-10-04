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
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>

<!DOCTYPE html>
<html>
<body>
<?php

exec('python query2.py GOOG',$var_name1);
echo '<br><br><br><br><br><br><div id="inside"><font id="pred" color="white">The highest price of Google in last 10 days: $'.$var_name1[0].'</font></div>';
//echo "The highest stock price of Google in the last ten days is - ".$var_name1[0]."<br>";

?>

</body>
</html>