<?php
require_once 'HTTP/Request2.php';
$headers = array(
);
$query_params = array(
    'subscription-key' => 'fe046f1cd089439a9d3aeb3491e91cc9',
);
$request = new Http_Request2('http://api.nfldata.apiphany.com/trial/XML/Teams');
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
//////////////////////////////////////////////////////////
$myXMLData = $response->getBody();
$xml = simplexml_load_string($myXMLData);
if ($xml === false) {
     echo "Failed loading XML: ";
     foreach(libxml_get_errors() as $error) {
         echo "<br>", $error->message;
     }
} else {
		foreach($xml->children() as $Team){
		echo $Team->Name."<br>";
		}

	//print_r($xml);
}
?>
