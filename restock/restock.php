<?php
include('db.php');
include('vars.php');

global $mysqli;

// sql to create table
$sql = "UPDATE stock set quan=3 where id=3";
$result =  $mysqli->query($sql);
if ($result) {
	print "Item restocked. ";
}

mysqli->close();
?>
