<?php 
	
	/*********************************************************************************
	Get Demographic Detail From IP Address
	
	This is basic example to get information based on user IP address using PHP & JSON
	
	Referece URL :- http://ip-api.com/
	Referece Doc URL :- http://ip-api.com/docs/
	Referece Doc URL :- http://ip-api.com/docs/api:json
	
	JSON Respnse :-
	
	{
		"status": "success",
		"country": "COUNTRY",
		"countryCode": "COUNTRY CODE",
		"region": "REGION CODE",
		"regionName": "REGION NAME",
		"city": "CITY",
		"zip": "ZIP CODE",
		"lat": LATITUDE,
		"lon": LONGITUDE,
		"timezone": "TIME ZONE",
		"isp": "ISP NAME",
		"org": "ORGANIZATION NAME",
		"as": "AS NUMBER / NAME",
		"query": "IP ADDRESS USED FOR QUERY"
	}
	
	**********************************************************************************/
	
	$ipAddress = getUserIP(); 
		
	$ipDetails = json_decode(file_get_contents("http://ip-api.com/json/{$ipAddress}"));
	//print_r(json_encode($ipDetails));
	
	$country = strtolower(trim($ipDetails->country));
	$countryCode = strtolower(trim($ipDetails->countryCode));
	
	$region = strtolower(trim($ipDetails->region));
	$regionName = strtolower(trim($ipDetails->regionName));
	
	$city = strtolower(trim($ipDetails->city));
	$zip = strtolower(trim($ipDetails->zip));
	
	$lat = strtolower(trim($ipDetails->lat));
	$lon = strtolower(trim($ipDetails->lon));
	
	$timezone = strtolower(trim($ipDetails->timezone));
	$org = strtolower(trim($ipDetails->org));	
?>

<?php 
	function getUserIP() 
	{ 
		$client  = @$_SERVER['HTTP_CLIENT_IP']; 
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR']; 
		$remote  = $_SERVER['REMOTE_ADDR']; 

		if(filter_var($client, FILTER_VALIDATE_IP)) 
		{ 
			$ipAddress = $client; 
		} 
		elseif(filter_var($forward, FILTER_VALIDATE_IP)) 
		{ 
			$ipAddress = $forward; 
		} 
		else 
		{ 
			$ipAddress = $remote; 
		} 

		return $ipAddress; 
	} 
?>
