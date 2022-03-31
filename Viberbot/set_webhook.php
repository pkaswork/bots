<?php
$auth_token = 'AUTH_TOKEN';
$webhook = 'WEBHOOK_URL';
	
$jsonData = 
'{
	"auth_token": "'.$auth_token.'",  // Вроде тут не нужен token https://developers.viber.com/docs/api/rest-bot-api/#post-data
	"url": "'.$webhook.'",
	"event_types": 	[
	      "delivered",
	      "seen",
	      "failed",
	      "subscribed",
	      "unsubscribed",
	      "conversation_started"
	],
	"send_name": true,
	"send_photo": true
}';
	
$ch = curl_init('https://chatapi.viber.com/pa/set_webhook');
echo "<pre>";
echo "CURLOPT_POST:";
var_dump(curl_setopt($ch, CURLOPT_POST, 1));
echo "CURLOPT_POSTFIELDS:";
var_dump(curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData));
echo "CURLOPT_HTTPHEADER:";
vau_dump(curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')));
$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if($err) {
	echo($err);
} else {
	echo($response);
}
echo "</pre>";
?>
