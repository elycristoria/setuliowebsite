<?php
include 'header.php';
$objPortfolio = new Portfolio();
$objGeneral = new General();

$strMessage = '';

if(isset($_POST['btnDelete']) || isset($_POST['btnDelete_x']))
{
	
	foreach($_POST['chkPortfolioImageId'] as $key => $value)
	{
		$objPortfolio -> voidSetImageId($value);
		$objPortfolio -> getPortfolioImageById();
		$objPortfolio -> deleteImageResource("../gallery/".$objPortfolio -> intGetId()."/".$objPortfolio -> strGetImageFilename());
		$objPortfolio -> deleteImageById();
	}
	$strMessage = $objGeneral -> strGenerateMessage('The item(s) are deleted', 'SUCCESS');
}
$objList = new DataList();

$strSql = 'SELECT a.fportImgId, a.fportImgFilename, b.fportTitle, b.fportId  FROM tblPortfolioImage a INNER JOIN tblPortfolio b ON a.fportId = b.fportId'; 			
$objList -> voidSetSql($strSql);
$objList -> voidSetSqlCount($strSql);
//define column header properties
$objList -> voidSetColumnHeader(array('<input type="checkbox" name="chkCheck" onClick="tick_box(frmPortfolioImageList, this.checked, \'chkPortfolioImageId[]\')">','PORTFOLIO NAME', 'FILENAME', ''));
//note: to indicate a table field enclose field name with MYSQL_DATE::fieldname::
$objList -> voidSetColumnValues(array('<input type="checkbox" name="chkPortfolioImageId[]" value="MYSQL_DATA::fportImgId::">', 'MYSQL_DATA::fportTitle::', 'MYSQL_DATA::fportImgFilename::','<img src="../gallery/MYSQL_DATA::fportId::/MYSQL_DATA::fportImgFilename::" width="75px" height="75px" class="imgList">'));
//basis of ordering (field name) when column header is clicked
$objList -> voidSetColumnOrderVars(array('','fportTitle', 'fportImgFilename', ''));
//default ordering, first parameter - tells what column will be sorted, in this case 0 = femEmployeeNo
$objList -> voidSetDefaultOrder('1', 'DESC');

		//stylesheet of column headers
		$objList -> voidSetStyleHeader("tbltitle_header", "tbltitle_header", "tbltitle_header", "tbltitle_header"); 
		//stylesheet of column header links
		$objList -> voidSetStyleHeaderLinks("tbltitle_header");
		//stylesheet of row values. 1st parameter = style of first row, 2nd parameter = style of alternate row
		$objList -> voidSetStyleRowData('tblrow1', 'tblrow2');
		//stylesheet of page
		$objList -> voidSetStylePage('editdelete');
		//stylesheet of pagelinks
		$objList -> voidSetStylePageNumLinks('editdelete');

$objList -> voidSetNoEntry('No Portfolio Found', 'noentry');

//no of rows to display per page
$objList -> voidSetDisplayLimit(20);
$objList -> voidSetTableProperties(array('border' => '0', 'width' => '100%', 'cellpadding' => '1', 'cellspacing' => '3', 'class' => 'ltgray'));
$objList -> voidSetColumnWidth(array('2%', '45%','25%', '5%'));
$objList -> voidSetColumnHeaderAlignment(array('center', 'center', 'center', 'center'));
$objList -> voidSetColumnValueAlignment(array('center', 'center', 'center', 'center'));

?>
<title><?php print AD_CLIENT_TITLE ?></title>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<style type="text/css">
			@import url('scripts/style3.css');
		</style>
<table cellpadding="0" cellspacing="0" width="80%">
	<tr>
		<td>
			<form name="frmPortfolioImageList" method="post" onSubmit="return confirmDelete(this)">
			<table cellspacing="1" cellpadding="5" width="80%" align="center">
				<tr>
					<td class="Heading"><?php print $strMessage ?></td>
				</tr>
				<tr>
					<td class="Heading"><img src="images/docs_icon.gif">&nbsp;&nbsp;PORTFOLIO: List</td>
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
						<td align="left" valign="top" class="formstable2"><input type="submit" name="btnDelete" value="Delete" onClick="return confirm_multiple_delete(document.frmPortfolioList, document.frmPortfolioList.elements['chkPortfolioId[]'] )" class="formbutton"/>
						<a href="portfolio-list.php" style="text-decoration:none"><input type="button" name="btnAdd" value="Back to Portfolio List" class="formbutton"/></a>
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