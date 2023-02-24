<?php

if ($_POST['action'] == "verify pan") {
		


	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$pancard=$_POST['pancard'];

	$dateTimestamp = strtotime($dob);
	$dob = date('Y-m-d', $dateTimestamp);

		$curl = curl_init();

		curl_setopt_array($curl, [
		  CURLOPT_URL => "https://api.gridlines.io/pan-api/v2/verify",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\n  \"pan_id\": \"$pancard\",\n  \"name\": \"$name\",\n  \"date_of_birth\": \"$dob\",\n  \"consent\": \"Y\"\n}",
		  CURLOPT_HTTPHEADER => [
		    "Content-Type: application/json",
		    "X-API-Key: Hzz5l8y17ez8Jb8fQK0P8JqKeEYIO9qu",
		    "X-Auth-Type: API-Key"
		  ],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);



	if ($err) {
	  // echo "cURL Error #:" . $err;
		echo "not_verified";
	}
	else {
	  echo $response;
	  $json_data=json_decode($response,true);

	  // if ($json_data['data']['pan_data']['name_match_status'] == 'MATCH' && $json_data['data']['pan_data']['dob_match_status'] == 'MATCH' ) {
	
	  //        $query="INSERT INTO `employee_info` (`name`, `date_of_birth`, `pan`) VALUES ('$name', '$dob','$pan', '$rname')";
   //           $result=mysqli_query($conn,$query);
   //           if ($result) {
   //           	echo 'verified';
   //           }
	  // }

	}


}


if ($_POST['action'] == "submit_data") {

         $query="INSERT INTO `employee_info` (`idate`, `vdate`, `jdate`, `rname`, `pan_status`, `comment`) VALUES ('$idate', '$vdate', '$jdate',  '$rname', '$pan_status', '$comment')";
         $result=mysqli_query($conn,$query);
         if ($result) {
         	echo "inserted";
         }

}





?>




