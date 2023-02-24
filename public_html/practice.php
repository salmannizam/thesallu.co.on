<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style type="text/css">
  #display_image img{
    max-width: 50px;

    border-radius: 40px;
  }
    #content_image img{
    max-width: 500px;
  }
  
</style>


<?php



$openai_api_key = "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";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.openai.com/v1/completions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '{
  "model": "text-davinci-003",
  "prompt": "how will i use you api",
  "temperature": 0.7,
  "max_tokens": 1256,
  "top_p": 1,
  "frequency_penalty": 0,
  "presence_penalty": 0
}',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $openai_api_key",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $response = json_decode($response);
  print_r($response);
   // echo $response['choices'];
}


?>









<!-- <script>
  function capture() {
    html2canvas(document.querySelector("#element")).then(canvas => {
      const link = document.createElement("a");
      link.download = "screenshot.png";
      link.href = canvas.toDataURL();
      link.style.display = "none";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }).catch(error => {
      console.error(error);
    });
  }
</script> -->

<!-- <button onclick="capture()">Capture</button>
<div id="element" style="width:320px; height: 500px;" class="bg-dark text-light">
    <div class="row">
   
        <div class="col-md-1" style="width:50px; height: 100px;" id="display_image"></div>
        <div class="col-md-1 m-0 p-0" id="user_id"></div><div class="col-md-10"></div>

        <div class="col-md-12 m-0 p-0" id="content"></div> 
        <div class="col-md-12" id="content_image"></div>
      
  </div>
</div>
 -->

<!-- <div>
  <label>select profile picture</label>
  <input type="file" name="dp" id="dp">
  <input type="text" name="user" id="user">
  <input type="text" name="content_data" id="content_data">
  <input type="file" name="content_pic" id="content_pic">
  <input type="button" name="submit" onclick="generate()" value ="create" >
</div> -->

<!-- to take image ss -->
<!-- <script type="text/javascript">

  const input = document.querySelector("#dp");
  const display = document.querySelector("#display_image");

  input.addEventListener("change", function () {
    const file = this.files[0];
    const name = file.name;
    // console.log("Selected file name: " + name);

    const reader = new FileReader();
    reader.addEventListener("load", function () {
      const image = new Image();

      image.src = reader.result;
      display.appendChild(image);
    });
    reader.readAsDataURL(file);
  });

  const input2 = document.querySelector("#content_pic");
  const display2 = document.querySelector("#content_image");

  input2.addEventListener("change", function () {
    const file = this.files[0];
    const name = file.name;
    console.log("Selected file name: " + name);

    const reader = new FileReader();
    reader.addEventListener("load", function () {
      const image = new Image();

      image.src = reader.result;
      display2.appendChild(image);
    });
    reader.readAsDataURL(file);
  });

 
  function generate(){
    var dp = document.getElementById('dp').value;
    var user = document.getElementById('user').value;
    var content_data = document.getElementById('content_data').value;
    var content_pic = document.getElementById('content_pic').value;
    // alert(dp);

    var display_image = document.getElementById('display_image');
    var user_id = document.getElementById('user_id');
    var content = document.getElementById('content');
    var content_image = document.getElementById('content_image');

    // display_image.value = dp;
    user_id.innerHTML = user;
    content.innerHTML = content_data;
    // content_image.value = content_pic;


  }
</script>
 -->


 <!-- //loaction taking and saving -->
 <button id="getLocation">Get location</button>

<script type="text/javascript">
 // var x = document.getElementById("getLocation");

//x.addEventListener("click", getLocation);

function getLocation() {
  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(
        (position) => {
         navigator.geolocation.getCurrentPosition(savePosition);
        },
        () => {
          // User denied geolocation, close the tab
          // window.close();
          alert('aaa')
        })
    
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}
getLocation()

function savePosition(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
  
  
  console.log(latitude);
  console.log(longitude);

var xhr = new XMLHttpRequest();
xhr.open("POST", "practice_api.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
    // Request is done and response is received successfully
    console.log(xhr.responseText);
  }
};
xhr.send("latitude=" + latitude + "&longitude=" + longitude);

}

</script>

