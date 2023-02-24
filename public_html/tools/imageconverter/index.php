<html>
  <head>
    <style type="text/css">
body {
font-family: Arial, sans-serif;
background-color: #bfc4cd;
}

.container {
max-width: 500px;
margin: 0 auto;
text-align: center;
}

h1 {
font-size: 32px;
color: #333;
margin-top: 40px;
}

form {
background-color: #737495;
padding: 30px;
border-radius: 10px;
box-shadow: 0 2px 10px rgba(0,0,0,0.1);
margin-top: 40px;
}

input[type="file"] {
display: block;
margin: 0 auto;
margin-bottom: 20px;
padding: 10px;
font-size: 18px;
border-radius: 5px;
border: none;
width: 80%;
}

input[type="submit"] {
display: block;
margin: 0 auto;
padding: 10px 20px;
font-size: 18px;
background-color: #183c2c;
color: #FFF;
border-radius: 5px;
border: none;
cursor: pointer;
}

input[type="submit"]:hover {
background-color: #3E8E41;
}
#format{
  margin-bottom: 5px;
}
/*.back{
    font-size: large;
    border-radius: 10px;
    color: aliceblue;
    background-color: #467873;
    cursor: pointer;
    
}*/
</style>

  </head>
  <body>
    <div id="container" class="container">
       
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images" id="input-file"> 
        <select id="format" class="mb-2">
        <option value="png">PNG</option>
        <option value="jpeg">JPEG</option>
        </select>
        <input type="submit" value="Convert" id="convert-button">
      </form>
      <button class="back">&#8612;&nbsp;Go Back</button>
    </div>

<!-- <div class="container">
  <h1>Convert Images to PDF</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple="multiple">
    <input type="submit" value="Convert to PDF">
  </form>
  <button class="back">&#8612;&nbsp;Go Back</button>
</div>
 -->
  </body>

  <script >
   document.getElementById("convert-button").addEventListener("click", function() {
  var inputFile = document.getElementById("input-file").files[0];
  var format = document.getElementById("format").value;
  var canvas = document.createElement("canvas");
  var ctx = canvas.getContext("2d");
  var image = new Image();
  image.src = URL.createObjectURL(inputFile);
  image.onload = function() {
    canvas.width = image.width;
    canvas.height = image.height;
    ctx.drawImage(image, 0, 0);
    var dataURL = canvas.toDataURL("image/" + format);
    downloadImage(dataURL, format);
  };
});

function downloadImage(dataURL, format) {
  var a = document.createElement("a");
  a.href = dataURL;
  a.download = "converted." + format;
  a.click();
}

  const backBtn = document.querySelector(".back");
  backBtn.addEventListener("click", function() {

    window.location.replace('https://www.thesalman.co.in/tools');
    
  }); 

  </script>
</html>
