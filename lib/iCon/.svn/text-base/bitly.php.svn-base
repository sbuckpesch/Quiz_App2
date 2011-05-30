<?php


/* make a URL small */
function make_bitly_url($url,$login = "iconsultants", 
						$appkey = "R_02100f13b7fe5bf53a06d04bbce6a3cf",$format = 'txt',$history = 1) {
	
	//create the URL
	$bitly = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).
'&format='.$format.'&history='.$history;

	//get the url
	//could also use cURL here
	$response = file_get_contents($bitly);

	//parse depending on desired format
	if(strtolower($format) == 'json')
	{
		$json = @json_decode($response,true);
		return $json['data']['url'];
	}
	elseif(strtolower($format) == 'xml') //xml
	{
		$xml = simplexml_load_string($response);
		return $xml->data->url;
	}
	elseif(strtolower($format) == 'txt') //text
	{
		return $response;
	}
}

?>