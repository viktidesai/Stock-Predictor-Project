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

<form id= "f1" action="register.php" method="post">
<h4 id="hreg1"> Are stock trends troubling you ? Sign up with us !</h4>
<h class="u">Enter your email </h><br>
<input name="email" type="text" class="i1">
<br>
<h class="u">Enter Username </h><br>
<input name="name" type="text" class="i1">
<br>
<h class ="u"> Enter Password </h> <br>
<input name ="pass" type="password" class="i1">

<br>
<h class ="u"> Confirm Password </h> <br>
<input name="conf_pass" type="password" class="i1">
<br>

<input id="but1" type="submit" name="Register" value="Register"></input>
<br>
</form>
</body>
</html>


<?php

$dbc = mysqli_connect('localhost', 'root', '','webapps_group14');
        if (!$dbc){
            die('Connection unsuccessful' . mysqli_connect_error());
          }


if(isset($_POST['Register'])){

$user_name=$_POST['name'];
$user_pass=$_POST['pass'];
$user_email=$_POST['email'];
$conf_pass=$_POST['conf_pass'];


if(empty($user_email)) {
 echo " <script> alert('Please Enter your Email!')</script>";
 exit();}

if(empty($user_name)) {
 echo " <script> alert('Please Enter Username!')</script>";
 exit();}
if(empty($user_pass)) {
 echo " <script> alert('Please Enter Password!')</script>";
 exit();}
 if(empty($conf_pass)) {
 echo " <script> alert('Please Confirm Password !')</script>";
 exit();}
 if($user_pass!=$conf_pass)
 {
 	echo " <script> alert('The passwords do not match!')</script>";
 exit();

 }
$query1="SELECT user_name from register WHERE user_name='$user_name'";
$result1=mysqli_query($dbc,$query1)  or die('Not inserted');

if(mysqli_num_rows($result1)>0){

echo "<script>alert('$user_name is already in the database. Please register with a different name')</script>";

}
else{


$query="INSERT INTO register ( user_name, password, email) VALUES ('$user_name', '$user_pass', '$user_email')";


 $result=mysqli_query($dbc,$query)  or die('Not inserted');


if($result ==true){

$_SESSION['name']=$user_name;
$_SESSION['pass'] = $user_pass;
$row = $result1->fetch_assoc();
echo "<script>window.open('login.php','_self')</script>";
}
mysqli_close($dbc);
}}
?>