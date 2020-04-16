<?php
include 'header.php';
$objProfile = new Profile();
$arrInterest = $objProfile -> blnGetInterest();


if (isset($_POST['btnUpdate']) || isset($_POST['btnUpdate_x'])) {
	if (empty($_POST['txtDescription'])) {
		$objProfile -> voidSetInterest('Set your interest here!');
	} else {
		$objProfile -> voidSetInterest($_POST['txtDescription']);
	}
	
	if ($objProfile -> blnSetInterest()) {
		General::voidRedirectUrl('interest.php');
	}
}
?>

<form name="frmProfile" method="post">
<div>&nbsp;</div>
<table class="tbl_properties">
	<tr>
		<td class="tbltitle_header" colspan="2">Set your interest here</td>
	</tr>
	<tr class="tblrow1">
		<td width="100%" colspan="2"><textarea name="txtDescription"  style="width: 100%; height: 200px;"><?php print $arrInterest[0]['finDescription']?></textarea></td>
	</tr>
	<tr class="tblrow2">
		<td colspan="2"><input type="submit" value="Update Interest" class="formbutton" name="btnUpdate"></td>
	</tr>
</table>
</form>