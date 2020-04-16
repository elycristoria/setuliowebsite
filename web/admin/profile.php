<?php
include 'header.php';
$objProfile = new Profile();	
$objProfile -> getProfileInformation();
$strProfileImage = $objProfile -> strGetPrimaryPhoto() == '' ? '../img/default-image.png' : '../img/'.$objProfile -> strGetPrimaryPhoto();

if (isset($_POST['btnUpdate']) || isset($_POST['btnUpdate_x'])) {
	$objProfile -> voidSetName($_POST['txtName']);
	$objProfile -> voidSetAddress($_POST['txtAddress']);
	$objProfile -> voidSetEmailAddress($_POST['txtEmailAddress']);
	$objProfile -> voidSetMobile($_POST['txtMobile']);
	$objProfile -> voidSetDescription($_POST['txtDescription']);
	
	if (!empty($_FILES['txtFile']['name'])) {
	    move_uploaded_file($_FILES['txtFile']['tmp_name'], '../img/'.$_FILES['txtFile']['name']);
	    $objProfile -> voidSetPrimaryPhoto($_FILES['txtFile']['name']);
	} else {
	    $objProfile -> voidSetPrimaryPhoto($objProfile -> strGetPrimaryPhoto());
	}

	if ($objProfile -> voidSetProfileInformation()) {
	    General::voidRedirectUrl('profile.php');
	}
}

?>
<form name="frmProfile" method="post"  enctype="multipart/form-data">
<div>&nbsp;</div>
<table class="tbl_properties">
	<tr>
		<td class="tbltitle_header" colspan="2">Your Personal Information</td>
	</tr>
		<tr class="tblrow2">
		<td width="30%">Profile Image</td>
		<td width="70%">
		<div class="containerImage">
			<img src="<?php print $strProfileImage ?>" width="160px" height="160px">
			<div class="top-left"><a href="javascript:void(0)" id="upload_file" onclick="document.getElementById('txtFile').click(); return false">Update Image</a>
			</div></div>
			<input type="file" name="txtFile" id="txtFile"/>
		</td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Name</td>
		<td width="70%"><input type="text" name="txtName" class="text" value="<?php print $objProfile -> strGetName() ?>"></td>
	</tr>
	<tr class="tblrow2">
		<td width="30%">Home Address</td>
		<td width="70%"><input type="text" name="txtAddress" class="text" value="<?php print $objProfile -> strGetAddress() ?>"></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Email Address</td>
		<td width="70%"><input type="text" name="txtEmailAddress" value="<?php print $objProfile -> strGetEmailAddress() ?>" class="text"></td>
	</tr>
	<tr class="tblrow2">
		<td width="30%">Mobile</td>
		<td width="70%"><input type="text" name="txtMobile" class="text" value="<?php print $objProfile -> strGetMobile() ?>"></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Description</td>
		<td width="70%"><textarea name="txtDescription"  style="width: 100%; height: 100px;"><?php print $objProfile -> strGetDescription()?></textarea></td>
	</tr>
	<tr class="tblrow2">
		<td colspan="2"><input type="submit" value="Update Profile" class="formbutton" name="btnUpdate"></td>
	</tr>
</table>
</form>