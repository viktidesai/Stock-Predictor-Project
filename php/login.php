<?php
//Software Engineering Group-14
session_start();

?>

<html>
<body id="bod">
<head><link rel="stylesheet" href="login.css"></head>
<div id="div1">
<h1 id="h1"><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></h1>
</div>

<form id= "f1" action="login.php" method="post">
<h4 id="hreg1"> Are stock trends troubling you? Sign up with us !</h4>
<h class="u"> Username </h><br>
<input name="name" type="text" class="i1">
<br>
<h class ="u"> Password </h> <br>
<input name ="pass" type="password" class="i1">

<br>
<input id="but1" type="submit" name="login" value="Login"></input>
<br>
<h id="ntau">Not a user? </h><a href="register.php" id="q"> Sign Up! </a>
</form>
</body>
</html>
<?php

$dbc = mysqli_connect('localhost', 'root', '','webapps_group14');
        if (!$dbc){
            die('Connection unsuccessful' . mysqli_connect_error());
          }

if(isset($_POST['login'])){

$user_name=$_POST['name'];
$user_pass=$_POST['pass'];
//$unsafeuser_email=$_POST['email'];
//$user_email=mysql_real_escape_string($unsafeuser_email);



if(empty($user_name)) {
 echo " <script> alert('Please enter name!!')</script>";
 exit();}
if(empty($user_pass)) {
 echo " <script> alert('Please enter password!!')</script>";
 exit();}
 

 
 
$query1="SELECT user_name from register WHERE password='$user_pass' AND user_name='$user_name'";
//echo $query1;
$result1=mysqli_query($dbc,$query1);
if(mysqli_num_rows($result1)!=0)
{

$_SESSION['name']=$user_name;
$_SESSION['pass']=$user_pass;
$row = $result1->fetch_assoc();
echo "<script>window.open('interface.php','_self')</script>";
}
else{
echo "<script>alert('Username or password is incorrect')</script>";
}

mysqli_close($dbc);
}
?>
