<?php
include 'header.php';
$objPortfolio = new Portfolio();
$objMySqlDb = new MySqlDb();

if (isset($_POST['btnSave']) || isset($_POST['btnSave_x'])) {
	$objPortfolio -> voidSetTitle($_POST['txtTitle']);
	$objPortfolio -> voidSetSetId($_POST['cboSetType']);
	$objPortfolio -> voidSetDescription(str_replace('"','',$_POST['txtDescription']));
	$objPortfolio -> voidSetDate($_POST['txtDate']);
	if ($_POST['chkIsActive'] == 1) {
		$objPortfolio -> voidSetIsActive(1);
	} else {
		$objPortfolio -> voidSetIsActive(0);		
	}
	$objPortfolio -> bnInsertPortfolio();
}
?>

<form name="frmPortfolio" method="post">
<div>&nbsp;</div>
<table class="tbl_properties">
	<tr>
		<td class="tbltitle_header" colspan="2">Add a new Portfolio</td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Title</td>
		<td width="70%"><input type="text" name="txtTitle" class="text" value=""></td>
	</tr>
	<tr class="tblrow2">
		<td width="30%">Description</td>
		<td width="70%"><textarea name="txtDescription"  style="width: 100%; height: 100px;"></textarea></td>
	</tr>	
	<tr class="tblrow1">
		<td width="30%">Set Type</td>
		<td width="70%"><?php print $objMySqlDb -> strPopulateSelectSql('cboSetType', 'SELECT fstId, fstName FROM tblSetType ORDER BY fstName', 'fstId', 'fstName','' ,'SELECT SET TYPE','class="select"')?></td>
	</tr>
	<tr class="tblrow2">
		<td width="30%">Date</td>
		<td width="70%"><input type="date" name="txtDate" value="" class="text"></td>
	</tr>
	<tr class="tblrow1">
		<td width="30%">Set as Active</td>
		<td width="70%"><input type="checkbox" name="chkIsActive" class="text" value="1"></td>
	</tr>

	<tr class="tblrow2">
		<td colspan="2"><input type="submit" value="Save Portfolio" class="formbutton" name="btnSave"></td>
	</tr>
</table>
</form>