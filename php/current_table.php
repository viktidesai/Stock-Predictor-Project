<?php
$connect_to_localhost = mysqli_connect('localhost', 'root', '','webapps_group14');
        if (!$connect_to_localhost){
            die('Connection unsuccessful' . mysqli_connect_error_error());
          }
        else
            echo("Database Connection successful.</br>");
$sql="CREATE TABLE price_current (
 `ticker` varchar(32) NOT NULL,
 `last_tran_date` date NOT NULL,
 `last_tran_time` time DEFAULT NULL,
 `ask_price` float(15) DEFAULT NULL,
 `bid_price` float(15) DEFAULT NULL,
 `open` float(15) DEFAULT NULL,
 `previous_close` float(15) DEFAULT NULL,
 `days_high` float(15) DEFAULT NULL,
  `days_low` float(15) DEFAULT NULL,
  `volume` bigint(15) DEFAULT NULL
  )";
  if ($connect_to_localhost->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " ;
	}

?>