<?php
// print_r($_POST);
$lon = $_POST['longitude'];
$lat = $_POST['latitude'];

$curl = curl_init('https://us1.locationiq.com/v1/reverse?key=pk.1e195e699d2d5af2ac79834ca5f5fbed&lat='.$lat.'&lon='.$lon.'&format=json');


curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER    =>  true,
  CURLOPT_FOLLOWLOCATION    =>  true,
  CURLOPT_MAXREDIRS         =>  10,
  CURLOPT_TIMEOUT           =>  30,
  CURLOPT_CUSTOMREQUEST     =>  'GET',
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
 $data = json_decode($response, true) ;

// echo $data['display_name'];
 // date('Y-m-d h:i:s').$data['display_name']

  # Include the Autoloader (see "Libraries" for install instructions)
		require 'vendor/autoload.php';
		use Mailgun\Mailgun;

		# Instantiate the client.
		$mgClient = new Mailgun('26171337b20a569ac7803783d33aca8c-d1a07e51-336aeeae');
		$domain = "sandbox87438044ebae4cf5889e24b1832a4235.mailgun.org";

		# Make the call to the client.
		$result = $mgClient->sendMessage("$domain",
			array('from'    => 'Mailgun Sandbox <postmaster@sandbox87438044ebae4cf5889e24b1832a4235.mailgun.org>',
				  'to'      => 'salman <salman.nizam@policyx.com>',
				  'subject' => 'Hello salman',
				  'text'    => 'Congratulations salman, you just sent an email with Mailgun!  You are truly awesome! '));


}





?>