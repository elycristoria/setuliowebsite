<?php
include 'header.php';
$objExperience = new Experience();
$objMySqlDb = new MySqlDb();

if (isset($_POST['btnSave']) || isset($_POST['btnSave_x'])) {
	$objExperience -> voidSetPositionTitle($_POST['txtPositionTitle']);
	$objExperience -> voidSetCompany($_POST['txtCompanyName']);
	$objExperience -> voidSetDescription(str_replace('"','',$_POST['txtDescription']));
	$objExperience -> voidSetStartDate($_POST['txtStartDate']);
	$objExperience -> voidSetEndDate($_POST['txtEndDate']);
	if ($_POST['chkIsCurrentJob'] == 1) {
		$objExperience -> voidSetIsCurrentJob(1);
		$objExperience -> updateIsCurrentJob();
	} else {
		$objExperience -> voidSetIsCurrentJob(0);		
	}
	if ($objExperience -> blnInsertNewExperience()) {
		General::voidRedirectUrl('experience-list.php');
	}
}
?>

<form name="frmExperience" method="post">
<div>&nbsp;</div>
<table class="tbl_properties">
	<tr>
		<td class="tbltitle_header" colspan="2">Add a new Experience</td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Position Title</td>
		<td width="70%"><input type="text" name="txtPositionTitle" class="text" value=""></td>
	</tr>
	<tr class="tblrow2">
		<td width="30%">Company Name</td>
		<td width="70%"><input type="text" name="txtCompanyName" class="text" value=""></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Description</td>
		<td width="70%"><textarea name="txtDescription"  style="width: 100%; height: 100px;"></textarea></td>
	</tr>	
	<tr class="tblrow2">
		<td width="30%">Start Date</td>
		<td width="70%"><input type="date" name="txtStartDate" value="" class="text"></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">End Date</td>
		<td width="70%"><input type="date" name="txtEndDate" value="" class="text"></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Set as Current Job</td>
		<td width="70%"><input type="checkbox" name="chkIsCurrentJob" class="text" value="1"></td>
	</tr>

	<tr class="tblrow2">
		<td colspan="2"><input type="submit" value="Save Experience" class="formbutton" name="btnSave"></td>
	</tr>
</table>
</form>