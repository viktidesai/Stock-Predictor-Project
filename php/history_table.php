<?php
$connect_to_localhost = mysqli_connect('localhost', 'root', '','webapps_group14');
        if (!$connect_to_localhost){
            die('Connection unsuccessful' . mysqli_connect_error_error());
          }
        else
            echo("Database Connection successful.</br>");
$sql="CREATE TABLE price_history (
 `ticker` varchar(32) NOT NULL,
 `price_date` date NOT NULL,
 `open_price` float(15) DEFAULT NULL,
 `high_price` float(15) DEFAULT NULL,
 `low_price` float(15) DEFAULT NULL,
 `close_price` float(15) DEFAULT NULL,
 `volume` bigint(20) DEFAULT NULL,
 `adj_close_price` float(15) DEFAULT NULL,
  `created_date` date NOT NULL
  )";
  if ($connect_to_localhost->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " ;
	}

?>