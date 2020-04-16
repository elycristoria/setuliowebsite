<?php
include 'header.php';
$objExperience = new Experience();

if(isset($_POST['btnDelete']) || isset($_POST['btnDelete_x']))
{
	
	foreach($_POST['chkExperienceId'] as $key => $value)
	{
		$objPortfolio -> voidSetId($value);
		$objPortfolio -> deleteExperienceById();
	}
	$strMessage = General::strGenerateMessage('The item(s) are deleted', 'SUCCESS');
}
$objList = new DataList();

$strSql = 'SELECT fexId, fexPositionTitle, fexCompany, DATE_FORMAT(fexStartDate, \'%d  %M %Y\') AS start_date, DATE_FORMAT(fexEndDate, \'%d  %M %Y\') AS end_date FROM tblExperience'; 			
$objList -> voidSetSql($strSql);
$objList -> voidSetSqlCount($strSql);
//define column header properties
$objList -> voidSetColumnHeader(array('<input type="checkbox" name="chkCheck" onClick="tick_box(frmExperienceList, this.checked, \'chkExperienceId[]\')">','POSITION TITLE', 'COMPANY', 'START DATE','END DATE', ''));
//note: to indicate a table field enclose field name with MYSQL_DATE::fieldname::
$objList -> voidSetColumnValues(array('<input type="checkbox" name="chkExperienceId[]" value="MYSQL_DATA::fexId::">', 'MYSQL_DATA::fexPositionTitle::', 'MYSQL_DATA::fexCompany::', 'MYSQL_DATA::start_date::', 'MYSQL_DATA::end_date::','<a href="experience-form-edit.php?expid=MYSQL_DATA::fexId::"><img src="images/icon_edit.gif"></a>'));
//basis of ordering (field name) when column header is clicked
$objList -> voidSetColumnOrderVars(array('','fexPositionTitle', 'fexCompany', 'fexStartDateDate', 'fexEndDate', ''));
//default ordering, first parameter - tells what column will be sorted, in this case 0 = femEmployeeNo
$objList -> voidSetDefaultOrder('1', 'ASC');

		//stylesheet of column headers
		$objList -> voidSetStyleHeader("tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header"); 
		//stylesheet of column header links
		$objList -> voidSetStyleHeaderLinks("tbltitle_header");
		//stylesheet of row values. 1st parameter = style of first row, 2nd parameter = style of alternate row
		$objList -> voidSetStyleRowData('tblrow1', 'tblrow2');
		//stylesheet of page
		$objList -> voidSetStylePage('editdelete');
		//stylesheet of pagelinks
		$objList -> voidSetStylePageNumLinks('editdelete');

$objList -> voidSetNoEntry('No Experience Found', 'noentry');

//no of rows to display per page
$objList -> voidSetDisplayLimit(20);
$objList -> voidSetTableProperties(array('border' => '0', 'width' => '100%', 'cellpadding' => '1', 'cellspacing' => '3', 'class' => 'ltgray'));
$objList -> voidSetColumnWidth(array('2%', '25%', '25%', '25%', '25%','5%'));
$objList -> voidSetColumnHeaderAlignment(array('center', 'center', 'center', 'center', 'center', 'center'));
$objList -> voidSetColumnValueAlignment(array('center', 'center', 'center', 'center', 'center', 'center'));

?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><title><?php print AD_CLIENT_TITLE ?></title>
		<style type="text/css">
			@import url('scripts/style3.css');
		</style>
<table cellpadding="0" cellspacing="0" width="80%">
	<tr>
		<td>
			<form name="frmExperienceList" method="post" onSubmit="return confirmDelete(this)">
			<table cellspacing="1" cellpadding="5" width="80%" align="center">
				<tr>
					<td class="Heading"><img src="images/docs_icon.gif">&nbsp;&nbsp;EXPERIENCE: List</td>
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
						<td align="left" valign="top" class="formstable2"><input type="submit" name="btnDelete" value="Delete" onClick="return confirm_multiple_delete(document.frmExperienceListList, document.frmExperienceList.elements['chkExperienceId[]'] )" class="formbutton"/>
						<a href="experience-form-add.php" style="text-decoration:none"><input type="button" name="btnAdd" value="Add a new Experience" class="formbutton"/></a>
						</td>
				</tr>
				<tr>
						<td align="right" valign="top">Viewing <?php $objList->voidDisplayPageNumber() ?></td>
				</tr>	
			</table>
			</form>
		</td>
	</tr>
</table>		
		


</body>