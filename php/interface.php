<?php
// Software Engineering Group-14
// written and debugged by: Kiran, Vikti
session_start();

// if(!($_SESSION['name'])){

// header("location: login.php");    // commented php session variable

// }
// ?>
<!DOCTYPE html>
<html>
<body id="bod">
<head><link rel="stylesheet" href="interface.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>


<div id="dive">
<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>
<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome ! </button>

</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
</div> 
<div id="d03">
<h4 id="ques">What do you want us to do ?</h4><br><br><br>
<button id="but1" onclick="window.location.href='predict.php'"><i class="glyphicon glyphicon-usd"></i><br>Predict</button>
<button id="but2" onclick="window.location.href='suggestMe.php'"><i class="glyphicon glyphicon-thumbs-up"></i><br> SuggestMe</button>
<button id="but3" onclick="window.location.href='rec_graph.php'"><i class="glyphicon glyphicon-stats"></i> <br>Show Graph</button>
<button id="but4" onclick="window.location.href='query.php'"><i class="glyphicon glyphicon-question-sign"></i> <br>Query</button>
</div>
</div>

<!-- <div id = "d03">
<button class="a1"> <i class="glyphicon glyphicon-info-sign"></i> About </button> &nbsp
<button class="a1"> <i class="glyphicon glyphicon-envelope"> Contact</i></button>
</div>
 -->
</body>
</html>