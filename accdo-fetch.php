<?php
/**
 * AuroraCDDOutput "acddo-fetch.php" file.
 *
 * This code fetches the data from the Aurora CDD and saves the result in the MySQL DB.
 *
 * This should be run as often as necessary via cron.
 *
 */

include 'accdo-config.php';

// Fetch the XML
$url = "http://".$cdd_address."/plant.xml";
$xml = simplexml_load_file($url);

// Connect to MySQL
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));

// Get latest seqno
$query="select seqno from {$table_prefix}inverterdata order BY seqno DESC LIMIT 0, 1";
$result = mysqli_query($link, $query);
$nextseqno = $result->fetch_object()->seqno + 1;

foreach ($xml->cdd->edd as $a) {
	$query="INSERT INTO {$table_prefix}inverterdata (seqno, seqts, sn, macrf, Etot_Wh,
	 Etot_kWh, Vout_V, Iout_A, Pout_W, Pout_kW, Freq_Hz, Vin_V, Tdsp_degC, Tmos_degC, ts)
	 VALUES ({$nextseqno}, now(), {$a->attributes()->sn}, '{$a->attributes()->macrf}', {$a->attributes()->Etot_Wh},
	{$a->attributes()->Etot_kWh}, {$a->attributes()->Vout_V}, {$a->attributes()->Iout_A}, 
	{$a->attributes()->Pout_W}, {$a->attributes()->Pout_kW}, {$a->attributes()->Freq_Hz},
	{$a->attributes()->Vin_V}, {$a->attributes()->Tdsp_degC}, {$a->attributes()->Tmos_degC},
	STR_TO_DATE('{$a->attributes()->ts}', '%d-%m-%y %T'))"; 
mysqli_query($link, $query);
}
mysqli_close($link);
?>
