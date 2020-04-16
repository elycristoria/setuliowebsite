<?php
include 'header.php';
$strMessage = '';
$objPortfolio = new Portfolio();
$objPortfolio -> voidSetId($_GET['portid']);
$objPortfolio -> getPortfolioById();
$arrPortfolioImages = $objPortfolio -> arrGetPortfolioGallery();

if (count($arrPortfolioImages) <= 0) {
   $strMessage = 'There are no images yet provided for '.$objPortfolio -> strGetTitle();
} else {
    $strMessage = 'There are '.count($arrPortfolioImages).' images availabe for the portfolio '.$objPortfolio -> strGetTitle();
}

if (isset($_POST['btnUpload']) || isset($_POST['btnUpload_x'])) {
 
    if (!file_exists('../gallery/'.$_GET['portid'].'')) {
        mkdir('../gallery/'.$_GET['portid'].'', 7777, true);
    }
    $error=array();
    $file_location = '../gallery/'.$_GET['portid'].'';
    $extension=array("jpeg","jpg","png","gif", "JPG");
    foreach($_FILES["files"]["tmp_name"] as $key => $name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        print $_FILES["files"]["tmp_name"][$key];
        if(in_array($ext,$extension)) {
            if(!file_exists($file_location.'/'.$file_name)) {
                move_uploaded_file($_FILES["files"]["tmp_name"][$key], $file_location.'/'.$file_name);
                $objPortfolio -> voidSetId($_GET['portid']);
                $objPortfolio -> voidSetImageFilename($file_name);
                $objPortfolio -> voidSetImageName($file_name);
                $objPortfolio -> voidSetImageIsActive(1);
                $objPortfolio -> blnInsertPortfolioImage();
            }
            else {
                $filename=basename($file_name,$ext);
                $newFileName=$filename.time().".".$ext;
                move_uploaded_file($_FILES["files"]["tmp_name"][$key],$file_location.'/'.$newFileName);
                $objPortfolio -> voidSetId($_GET['portid']);
                $objPortfolio -> voidSetImageFilename($file_name);
                $objPortfolio -> voidSetImageName($file_name);
                $objPortfolio -> voidSetImageIsActive(1);
                $objPortfolio -> blnInsertPortfolioImage();
            }
        }
        else {
            array_push($error,"$file_name, ");
        }
    }
}
?>
<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>

</head>

<body>
<!-- Trigger the Modal -->
<form action="<?php print "gallery.php?".$_SERVER['QUERY_STRING'] ?>" name="frmPortfolioGallery" method="post" enctype="multipart/form-data">
<div>&nbsp;</div>
<table class="tbl_properties">
	<tr>
		<td class="tbltitle_header" colspan="2">Portfolio Image Gallery</td>
	</tr>
	<tr class="tblrow2">
		<td colspan="2"><?php print $strMessage ?></td>
	</tr>
	<?php if (count($arrPortfolioImages) > 0) { ?>
	<tr>
		<td colspan="2">
            <!-- Images used to open the lightbox -->
            <div class="row">
              <?php for ($i=0; $i < count($arrPortfolioImages); $i++) { ?>
              <div class="column">
                <img src="../gallery/<?php print $arrPortfolioImages[$i]['fportId'].'/'. $arrPortfolioImages[$i]['fportImgFilename'] ?>" onclick="openModal();currentSlide(<?php print $i+1 ?>)" class="hover-shadow" width="164px" height="109px">
              </div>
			  <?php } ?>	
            </div>
            
            <!-- The Modal/Lightbox -->
            <div id="myModal" class="modal" role="dialog">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">
               <?php for ($i=0; $i < count($arrPortfolioImages); $i++) { ?>		
                <div class="mySlides">
                  <img src="../gallery/<?php print $arrPortfolioImages[$i]['fportId'].'/'. $arrPortfolioImages[$i]['fportImgFilename'] ?>" style="width:100%">
                </div>
			   <?php } ?>            
                <!-- Next/previous controls -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
                <!-- Caption text -->
                <div class="caption-container">
                  <p id="caption"></p>
                </div>
            
                <!-- Thumbnail image controls -->
               <?php for ($i=0; $i < count($arrPortfolioImages); $i++) { ?>		
                <div class="column">
                  <img class="demo" src="../gallery/<?php print $arrPortfolioImages[$i]['fportId'].'/'. $arrPortfolioImages[$i]['fportImgFilename'] ?>" onclick="currentSlide(<?php print $i+1 ?>)" alt="<?php print $arrPortfolioImages[$i]['fportImgName'] ?>" width="164px" height="109px">
                </div>
			   <?php } ?>            
              </div>
            </div>
		
		</td>
	</tr>
	<?php } ?>
	<tr class="tblrow2">
		<td colspan="2"><input type="file" value="Upload Images" name="files[]" multiple></td>
	</tr>
	<tr class="tblrow2">
		<td colspan="2"><input type="submit" name="btnUpload" value="Upload Images" class="formbutton"></td>
	</tr>
</table>
</form>
</body>
</html>