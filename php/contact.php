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


<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button> //hello

</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
</div> 
<div id="contform">
<form id="form2" method="get">
<h6 class="formcon">All fields are compulsory*</h6>

<h5 class="formcon" >Name:</h5>
<input class="formin" type="text"name="name" ></input>
<h5 class="formcon" >Email-id:</h5>
<input class="formin" type="text" name="email"></input>
<h5 class="formcon" >Is it a Comment, Question or a Query?</h5>
<input class="formin" type="text" name="sub"></input>

<h5 class="formcon" >Have Comments,Questions or Suggestions? Write here:</h5>
<input class="formin" type="text" name="bod" style="height:100px""width:800px"></input> <br>
<input type="submit" name="button" id="in2" ></input>
</form>
</div>

<?php
if(isset($_GET['button']))
{
  
$subject=$_GET['sub'];
$txt=$_GET['bod'];
$email=$_GET['email'];



$to = "notificationstalkthestock@gmail.com" ;

$headers = "From:contactus@stalkthestock.com";

mail($to,$subject,$txt,$headers);
}

?>


</body>
</html>