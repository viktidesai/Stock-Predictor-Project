<!DOCTYPE html>
<html>
<body>
<?php

exec('python bayesian.py GOOG',$var_name);
echo $var_name[0]."\t";
echo $var_name[1];

?>

</body>
</html>