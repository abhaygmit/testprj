<?php
function get_lat_lang_by_address($address)
{
	$result  = '';	
	$new_address= urlencode($address);
	$url 	 	= "http://maps.google.com/maps/api/geocode/json?address=$new_address&sensor=false";
	$ch 		= curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response);
	
	if($response_a->results)
	{
		$result['latitude']  = $response_a->results[0]->geometry->location->lat;			
		$result['longitude'] = $response_a->results[0]->geometry->location->lng;
	}
	else
	{
		$result['latitude']  = 0;
		$result['longitude'] = 0;
	}
	return $result;
}

?>
