<?php
// echo "<pre>";
// print_r($_SERVER);
include 'TCPDF-master/tcpdf.php';


if(isset($_FILES['images'])) {
  $images = $_FILES['images'];

  // create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Author Name');
  $pdf->SetTitle('Image to PDF');

  // remove default header/footer
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  // set margins
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  for($i = 0; $i < count($images['name']); $i++) {
    $image = array(
      'name' => $images['name'][$i],
      'type' => $images['type'][$i],
      'tmp_name' => $images['tmp_name'][$i],
      'error' => $images['error'][$i],
      'size' => $images['size'][$i]
    );

    // add a page
    $pdf->AddPage();

    // add image to page
    $pdf->Image($image['tmp_name'], 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
  }

  // Output the PDF document
  $file_name = 'images.pdf';
  if(file_exists($file_name)) {
    unlink($file_name);
  }
  $pdf->Output($file_name, 'I');
}
?>
<!-- <form action="" method="post" enctype="multipart/form-data">
  <input type="file"  name="images[]" multiple="multiple">
  <input type="submit" value="Convert to PDF">
</form> -->
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

</style>


<div class="container">
  <h1>Convert Images to PDF</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple="multiple">
    <input type="submit" value="Convert to PDF">
  </form>
  <button class="back">&#8612;&nbsp;Go Back</button>
</div>

<script type="text/javascript">
  const backBtn = document.querySelector(".back");
  backBtn.addEventListener("click", function() {

    window.location.replace('https://www.thesalman.co.in/tools');
    
  });  
</script>
