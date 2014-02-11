<?php
/**
 * AuroraCDDOutput "acddo-push.php" file.
 *
 * This code fetches the latest data stored in the MySQL DB and sends it to pvoutput using a HTTP get request.
 *
 * This should be run as often as necessary via cron.
 *
 */

include 'accdo-config.php';

// The url for the pvoutput live API
$url = 'http://pvoutput.org/service/r2/addstatus.jsp';

// Connect to MySQL
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Error " . mysqli_error($link));

// Get latest seqno
$query="select seqno from {$table_prefix}inverterdata order BY seqno DESC LIMIT 0, 1";
$result = mysqli_query($link, $query)->fetch_object()->seqno;

// Query latest seqno
$query="SELECT seqts, sum(etot_Wh) as pvgen, sum(Pout_W) as pvpwr, round(avg(Tdsp_degC),2) as pvtemp, round(avg(Vin_V),2) as pvvolt FROM {$table_prefix}inverterdata WHERE
	seqno = $result";
$result = mysqli_query($link, $query)->fetch_object();

// Some date manipulation
$seqts = date_create_from_format('Y-m-d G:i:s', $result->seqts);
$pvdate=$seqts->format('Ymd');
$pvtime=$seqts->format('H:i');

$geturl = $url.'?key='.$pvoutput_apikey.'&sid='.$pvoutput_sid.'&d='.$pvdate.'&t='.$pvtime.'&v1='.$result->pvgen.'&v2='.$result->pvpwr.'&v5='.$result->pvtemp.'&v6='.$result->pvvolt.'&c1=1';
echo $geturl."\n";

mysqli_close($link);
?>
