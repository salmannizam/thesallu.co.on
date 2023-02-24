<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>My Page</title>
  <style type="text/css">
body {
  background: linear-gradient(to right, #a7927e, #6fd99e);
  height: 100vh;
  /*display: flex;*/
  align-items: center;
  justify-content: center;
  margin-top: 150px;
}

.container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

}

button {
  padding: 15px 30px;
  margin: 20px;
  background-color: #433e52;
  color:white;
  border: none;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

button:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 8px rgba(0,0,0,0.3);
  background-color: #275276;

}

@media (max-width: 700px) {
  .container {
    flex-direction: column;
  }
}
.back:hover{
  background-color: #c3353b;
}
  </style>

</head>
<body>
  <div style="text-align: center;">
    <h1>Our All tools</h1>
  </div>
  <div class="container">
    
    <div>
      <button class="calculator"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;Calculator</button>
      <button class="imagetopdf"><i class="fa-solid fa-file-pdf"></i>&nbsp;Image to PDF</button>
      <button class="image-converter">&nbsp;Image Converter</button>
      <button class="to-do">&nbsp;To-Do App</button>
      <button class="back">&#8612;&nbsp;Go Back</button>
    </div>

  </div>
  <script >
    // Add event listeners to buttons
    const calculatorBtn = document.querySelector(".calculator");
    const imageConverterBtn = document.querySelector(".image-converter");
    const imagetopdfbtn = document.querySelector(".imagetopdf");
    const todobtn = document.querySelector(".to-do");
    const backBtn = document.querySelector(".back");
    calculatorBtn.addEventListener("click", function() {
     window.location.replace('https://www.thesalman.co.in/tools/calculator/');
    });

    imageConverterBtn.addEventListener("click", function() {
      window.location.replace('https://www.thesalman.co.in/tools/imageconverter/');
    });
    imagetopdfbtn.addEventListener("click", function() {
      window.location.replace('https://www.thesalman.co.in/tools/imagetopdf/');
    });
    todobtn.addEventListener("click", function() {
      window.location.replace('https://www.thesalman.co.in/tools/to-do_app/');
    });

    backBtn.addEventListener("click", function() {

      window.location.replace('https://www.thesalman.co.in');
      
    });

  </script>
</body>
</html>
