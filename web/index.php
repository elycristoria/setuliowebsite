
<html lang="en">

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap library  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
/* Style the Image Used to Trigger the Modal */
.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  /* width: 25%; */
}

/* The Modal (background) */

* {
  box-sizing: border-box;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 75%;
  height: 75%;
  overflow: auto;
  background-color: #868e96;
  opacity: .9;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModalIndex').modal({show:true});
        });
    }); 
});
</script>
</head>
<?php
include 'header.php';
$objProfile = new Profile();
$objPortfolio = new Portfolio();
$objExperience = new Experience();


$objProfile -> getProfileInformation();
$arrInterest = $objProfile -> blnGetInterest();
$arrPortfolioList = $objPortfolio -> arrGetAllPortfolio();
$arrExperienceList = $objExperience -> arrGetAllExperience();
$strNames = explode(" ", $objProfile -> strGetName());
?>
<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?php print $objProfile -> strGetName() ?></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php print $objProfile -> strGetPrimaryPhoto() == '' ? 'img/default-image.png' : 'img/'.$objProfile -> strGetPrimaryPhoto();
        ?>" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0"><?php print $strNames[0] ?>
          <span class="text-primary"><?php print $strNames[1] ?></span>
        </h1>
        <div class="subheading mb-5"><?php print $objProfile -> strGetAddress() ?> · <?php print $objProfile -> strGetMobile() ?> ·
          <a href="<?php print $objProfile -> strGetEmailAddress() ?>"><?php print $objProfile -> strGetEmailAddress() ?></a>
        </div>
        <p class="lead mb-5"><?php print $objProfile -> strGetDescription() ?></p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="portfolio">
      <div class="w-100">
        <h2 class="mb-5">Portfolio</h2>
        <?php for ($i=0; $i < count($arrPortfolioList); $i++) { ?>
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><a href="javascript:void(0);" data-href="gallery_view.php?portid=<?php print $arrPortfolioList[$i]['fportId']?>" class="openPopup"><?php print $arrPortfolioList[$i]['fportTitle'] ?></a></h3>
            <div class="subheading mb-3"><?php print $arrPortfolioList[$i]['fstName'] ?></div>
            <p><?php print $arrPortfolioList[$i]['fportDescription'] ?></p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?php print date("d F, Y", strtotime($arrPortfolioList[$i]['fportDate'])) ?></span>
          </div>
        </div>
		<?php } ?>
      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Experiences</h2>
        <?php for ($i=0; $i < count($arrExperienceList); $i++) { ?>
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><?php print $arrExperienceList[$i]['fexCompany'] ?></h3>
            <div class="subheading mb-3"><?php print $arrExperienceList[$i]['fexPositionTitle'] ?></div>
            <div><?php print $arrExperienceList[$i]['fexDescription'] ?></div>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?php print $arrExperienceList[$i]['fexIsCurrentJob'] == '1' ? date("d F Y", strtotime($arrExperienceList[$i]['fexStartDate']))." - ".'Current Job' : date("d F Y", strtotime($arrExperienceList[$i]['fexStartDate']))." - ".date("d F Y", strtotime($arrExperienceList[$i]['fexEndDate'])) ?></span>
          </div>
        </div>
        <?php } ?>
      </div>
    </section>

    <hr class="m-0">


    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Interests</h2>
        <p><?php print $arrInterest[0]['finDescription']?></p>

      </div>
    </section>

    <hr class="m-0">

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

<div id="myModalIndex" role="dialog">
	<div class="modal-body"></div>
</div>
</body>
</html>
