<?php

// session_start();

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
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>

<div id="d03">
<a href="query1.php"> <input type="button" id="but1" value="Latest stock price"/> </a>
<a href="query2.php"><input type="button" id="but2" value="Google High"/></a>
<a href="query3.php"><input type="button" id="but3" value="Microsoft Average"/> </a>
<br><a href="query4.php"><input type="button" id="but4" value="Stock Low"/> </a>
<a href="query5.php"><input type="button" id="but5" value="Stock Comparison"/> </a>
</div>

</body>
</html>