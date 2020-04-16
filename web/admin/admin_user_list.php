<?php
include 'header.php';
$objAdmin = new AdminUser();
$objGeneral = new General();
$strMessage = '';
if(isset($_POST['btnDelete']))
{
	
	foreach($_POST['chkAdminId'] as $key => $value)
	{
		$objAdmin -> voidSetId($value);
		$objAdmin -> intDeleteAdminUser();
	}
	$strMessage = $objGeneral -> strGenerateMessage('The item(s) are deleted', 'SUCCESS');
}
$objList = new DataList();

$strSql = 'SELECT *, IF(fauIsActive = 1, "Yes", "No") AS Active FROM tblAdminUsers'; 			
$strSqlCount = 'SELECT COUNT(*) FROM tblAdminUsers';
$objList -> voidSetSql($strSql);
$objList -> voidSetSqlCount($strSqlCount);
//define column header properties
$objList -> voidSetColumnHeader(array('<input type="checkbox" name="chkCheck" onClick="tick_box(frmAdminList, this.checked, \'chkAdminId[]\')">','USERNAME', 'FIRST NAME', 'LAST NAME' ,'DATE ADDED','ACTIVE','' ));
//note: to indicate a table field enclose field name with MYSQL_DATE::fieldname::
$objList -> voidSetColumnValues(array('<input type="checkbox" name="chkAdminId[]" value="MYSQL_DATA::fauId::">', 'MYSQL_DATA::fauUserName::','MYSQL_DATA::fauFirstName::', 'MYSQL_DATA::fauLastName::' ,'MYSQL_DATA::fauDate::','MYSQL_DATA::Active::','<a href="admin_user_form_edit.php?id=MYSQL_DATA::fauId::"><img src="images/icon_edit.gif"></a>'));
//basis of ordering (field name) when column header is clicked
$objList -> voidSetColumnOrderVars(array('','fauUserName', 'fauFirstName', 'fauLastName', 'fauDate','fauIsActive',''));
//default ordering, first parameter - tells what column will be sorted, in this case 0 = femEmployeeNo
$objList -> voidSetDefaultOrder('1', 'ASC');

		//stylesheet of column headers
		$objList -> voidSetStyleHeader("tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header","tbltitle_header","tbltitle_header"); 
		//stylesheet of column header links
		$objList -> voidSetStyleHeaderLinks("tbltitle_header");
		//stylesheet of row values. 1st parameter = style of first row, 2nd parameter = style of alternate row
		$objList -> voidSetStyleRowData('tblrow1', 'tblrow2');
		//stylesheet of page
		$objList -> voidSetStylePage('editdelete');
		//stylesheet of pagelinks
		$objList -> voidSetStylePageNumLinks('editdelete');

$objList -> voidSetNoEntry('No Service PC!', 'noentry');

//no of rows to display per page
$objList -> voidSetDisplayLimit(20);
$objList -> voidSetTableProperties(array('border' => '0', 'width' => '100%', 'cellpadding' => '1', 'cellspacing' => '3', 'class' => 'ltgray'));
$objList -> voidSetColumnWidth(array('2%', '15%','15%','15%','15%','5%','5%'));
$objList -> voidSetColumnHeaderAlignment(array('center', 'center', 'center', 'center', 'center', 'center', 'center'));
$objList -> voidSetColumnValueAlignment(array('center', 'center', 'center', 'center', 'center', 'center', 'center'));

?>
<title><?php print AD_CLIENT_TITLE ?></title>
		<style type="text/css">
			@import url('scripts/style3.css');
		</style>
<form name="frmAdminList" method="post" onSubmit="return confirmDelete(this)">
<table cellspacing="1" cellpadding="5">
	<tr>
		  <td>
			<table cellspacing="1" cellpadding="5" width="80%" align="center">
				<tr>
				  <td align="center" colspan="5"><?php print $strMessage ?></td>
				</tr>
				<tr>
				  <td align="right" colspan="5">Viewing <?php $objList->voidDisplayPageNumber() ?></td>
				</tr>
				<tr>
					<td align="center" valign="middle" class="formstable2" colspan="2" height="35">&nbsp;</td>
				</tr>	
				<tr>
					<td width="6%" align="center" colspan="2"><?php $objList->voidDisplayDataList();?></td>
				</tr>
				<tr>
						<td align="left" valign="top" class="formstable2"><input type="submit" name="btnDelete" value="Delete" onclick="return confirm_multiple_delete(document.frmAdminList, document.frmAdminList.elements['chkAdminId[]'] )" class="formbutton" />
						<a href="admin_user_form_add.php" style="text-decoration:none"><input type="button" name="btnAdd" value="Add Admin" class="formbutton" /></a>
						</td>
				</tr>
				<tr>
						<td align="right" valign="top">Viewing <?php $objList->voidDisplayPageNumber() ?></td>
				</tr>	
			</table>
		</td>
	</tr>		
</table>
</form>

