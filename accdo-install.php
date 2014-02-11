<?php
include 'accdo-config.php';

// Connect to MySQL
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));

$query = "CREATE TABLE IF NOT EXISTS `".$table_prefix."inverterdata` (
	`id` int unsigned NOT NULL auto_increment,
	`seqno` int,
	`seqts` datetime,
	`sn` int,
        `macrf` varchar(25),	
	`Etot_Wh` float,
	`Etot_kWh` float,
	`Vout_V` float,
	`Iout_A` float,
	`Pout_W` float,
	`Pout_kW` float,
	`Freq_Hz` float,
	`Vin_V` float,
	`Tdsp_degC` float,
	`Tmos_degC` float,
	`ts` datetime,
	PRIMARY KEY (`id`)
	) DEFAULT CHARSET=".DB_CHARSET."";

mysqli_query($link, $query);
mysqli_close($link);			
?>
