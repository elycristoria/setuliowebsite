<?php
include '../conf/config.php';

$objPortfolio = new Portfolio();
$objPortfolio -> voidSetId($_GET['portid']);
$objPortfolio -> getPortfolioById();
$arrPortfolioImages = $objPortfolio -> arrGetPortfolioGallery();
?>
<html>
<head>
<style>
.modal {
  display: block;
}
</style>
<script type="text/javascript" src="scripts/default.js"></script>
</head>
<body onLoad="openModal();currentSlide(1);">
<!-- The Modal/Lightbox -->
    <div id="myModal" class="modal">
      <span class="close cursor" onclick="closeModal()">&times;</span>
      <div class="modal-content">
       <?php for ($i=0; $i < count($arrPortfolioImages); $i++) { ?>		
        <div class="mySlides">
          <img src="gallery/<?php print $arrPortfolioImages[$i]['fportId'].'/'. $arrPortfolioImages[$i]['fportImgFilename'] ?>" style="width:100%">
        </div>
       <?php } ?>            
        <!-- Next/previous controls -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    
        <!-- Caption text -->
        <div class="caption-container">
          <p id="caption"></p>
        </div>
      </div>
</body>
</html>
