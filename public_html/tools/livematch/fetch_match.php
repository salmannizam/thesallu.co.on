<?php

$request = new HttpRequest();
$request->setUrl('https://cricket-live-data.p.rapidapi.com/match/2432999');
$request->setMethod(HTTP_METH_GET);

$request->setHeaders([
	'X-RapidAPI-Key' => '75e0de048cmsh121e44af7a51ff0p1d1351jsna664bbbb3991',
	'X-RapidAPI-Host' => 'cricket-live-data.p.rapidapi.com'
]);

try {
	$response = $request->send();

	echo $response->getBody();
} catch (HttpException $ex) {
	echo $ex;
}