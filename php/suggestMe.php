<?php

session_start();

if(!($_SESSION['name'])){

header("location: login.php");

}
?>
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
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
<?php
set_time_limit(300);
exec('python svm.py GOOG',$var_name1);
//echo "Google(GOOG) - ".$var_name1[0]."<br>";
exec('python svm.py YHOO',$var_name2);
//echo "Yahoo(YHOO) - ".$var_name2[0]."<br>";
exec('python svm.py MSFT',$var_name3);
//echo "Microsoft(MSFT) - ".$var_name3[0]."<br>";
exec('python svm.py INTC',$var_name4);
//echo "Intel Corp.(INTC) - ".$var_name4[0]."<br>";
exec('python svm.py AAPL',$var_name5);
//echo "Apple(AAPL) - ".$var_name5[0]."<br>";
exec('python svm.py FB',$var_name6);
//echo "Facebook(FB) - ".$var_name6[0]."<br>";
exec('python svm.py CSCO',$var_name7);
//echo "Cisco(CSCO) - ".$var_name7[0]."<br>";
exec('python svm.py ERIC',$var_name8);
//echo "Ericsson(ERIC) - ".$var_name8[0]."<br>";
exec('python svm.py BAC',$var_name9);
//echo "Bank of America(BAC) - ".$var_name9[0]."<br>";
exec('python svm.py C',$var_name10);
//echo "Citi(C) - ".$var_name10[0]."<br>";


?>
<br><br><br><br>
<table align="center" class="tab" border="0" style="width:40%" >
<tr>
    <td><b> <font class="compan" color="#7FB347">COMPANY</font></b></td>
    <td><b> <font class="compan" color="#7FB347">SUGGESTION</font></b></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">APPLE</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name5[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">BANK OF AMERICA</font></td>
    <td><font class="tckr" color="white"><?php echo $var_name9[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">CISCO</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name7[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">CITI</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name10[0];?></font></td>
</tr><tr>
    <td><font class="tckr" color="white">ERICSSON</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name8[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">FACEBOOK</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name6[0];?></font></td>
</tr><tr>
    <td> <font class="tckr" color="white">GOOGLE</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name1[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">INTEL</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name4[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">MICROSOFT</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name3[0];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">YAHOO</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name2[0];?></font></td>
</tr>
</table>
</body>
</html>