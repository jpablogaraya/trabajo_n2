<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "cmsdb";

mysql_connect($hostname,$username,$password) or die ("connection failed");
mysql_select_db($database) or die ("error connect database");
?>