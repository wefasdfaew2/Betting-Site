<?php
$db_ip = "localhost:3306";
$db_user = "admin_sports";
$db_pass = "admin_sports";
$db_databes = "admin_sports";
mysql_connect($db_ip, $db_user, $db_pass) or die(mysql_error()); 
mysql_select_db($db_databes);
$getname = $_GET["getname"];
$result = mysql_query("SELECT * FROM `admin_settings` WHERE `name` = '$getname'");
$result = mysql_fetch_array($result);
echo $result['val'];
/*
$everything = mysql_query("SELECT * FROM `admin_settings`");
$everything = mysql_fetch_assoc($everything);
foreach($everything as $everyt){
echo $everyt;
}

$year= mysql_query("SELECT * FROM `admin_settings` WHERE `name` = 'currentnflyear'");
$season= mysql_query("SELECT * FROM `admin_settings` WHERE `name` = 'currentnflseason'");
$year = mysql_fetch_assoc($year);
$season = mysql_fetch_assoc($season);*/



?>