<?php
$db_ip = "localhost:3306";
$db_user = "admin_sports";
$db_pass = "admin_sports";
$db_databes = "admin_sports";
mysql_connect($db_ip, $db_user, $db_pass) or die(mysql_error()); 
mysql_select_db($db_databes);
$year= mysql_query("SELECT * FROM `admin_settings` WHERE `name` = 'currentnflyear'");
$season= mysql_query("SELECT * FROM `admin_settings` WHERE `name` = 'currentnflseason'");
$year = mysql_fetch_assoc($year);
$season = mysql_fetch_assoc($season);
require_once 'HTTP/Request2.php';
$headers = array(
);
$query_params = array(
    'subscription-key' => 'fe046f1cd089439a9d3aeb3491e91cc9',
);
$request = new Http_Request2('http://api.nfldata.apiphany.com/trial/XML/Player/'.$_GET['playerid']);
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setHeader($headers);
 
$url = $request->getUrl();
$url->setQueryVariables($query_params);
try
{
    $response = $request->send();
}
catch (HttpException $ex)
{
    echo $ex;
}
$myXMLData = $response->getBody();
$xml = simplexml_load_string($myXMLData);
if ($xml === false) {
     echo "Failed loading XML: ";
     foreach(libxml_get_errors() as $error) {
         echo "<br>", $error->message;
     }
} else {
	//print_r($xml);
}
foreach($xml->children() as $Player => $pp){
echo $Player.">".$pp.";;";
	foreach($pp->children() as $key => $val){
	echo $key.">".$val.";;";
	}
}
?>