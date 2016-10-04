<!DOCTYPE html>
<html>
<body>
<?php
exec('python analyzer2.py GOOG',$var_name1);
echo "The predicted values for the next 5 days are as follows: "."<br>";
echo $var_name1[0]."<br>";
echo $var_name1[1]."<br>";
echo $var_name1[2]."<br>";
echo $var_name1[3]."<br>";
echo $var_name1[4]."<br>";
?>

</body>
</html>