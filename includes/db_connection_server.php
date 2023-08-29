<?php
define("SERVERNAME", "50.62.177.12");
define("USERNAME", "BeaconCrestData");
define("PASSWORD", "BeaconCrestDB1!");
define("DBNAME", "BeaconCrestData");
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
if (mysqli_connect_error()) {
	die("Database connection failed. " . mysqli_connect_error());
}
?>