<?php
include 'header.php';
$objAdminUser = new AdminUser();
$objMySqlDb = new MySqlDb();
$objAdminUser -> voidSetId($_GET['id']);
$objAdminUser -> blnGetAdminUserId();

if (isset($_POST['btnSubmit']) || isset($_POST['btnSubmit_x']))
{
	$objAdminUser -> voidSetUsername($_POST['txtUsername']);
	if ($_POST['txtPassword'] == '')
	{
			$objAdminUser -> voidSetPassword($objAdminUser -> strGetUsername());
	}
	else
	{
			$objAdminUser -> voidSetPassword($_POST['txtPassword']);
	}
	$objAdminUser -> voidSetUserLevelId($_POST['cboUserLevelType']);
	$objAdminUser -> voidSetFirstName($_POST['txtFirstName']);
	$objAdminUser -> voidSetLastName($_POST['txtLastName']);
	$objAdminUser -> voidSetId($_GET['id']);
	if ($objAdminUser -> blnUpdateAdminUser())
	{
		General::voidRedirectUrl('admin_user_list.php');
	}
}

?>
<script type="text/javascript">
function validatePassword()
{
	var strMessage = '';
	if (document.frmEditAdminUser.txtUsername.value == "")
	{
		strMessage += "Username\n";
	}
	if (document.frmEditAdminUser.txtFirstName.value == "")
	{
		strMessage += "First Name\n";
	}
	if (document.frmEditAdminUser.txtLastName.value == "")
	{
		strMessage += "Last Name\n";
	}
	if (document.frmEditAdminUser.txtPassword.value != "")
	{
		if (document.frmEditAdminUser.txtPassword.value == document.frmEditAdminUser.txtConfirmPassword.value)
		{
			return true;
		}
		else
		{
			alert("The Passwords you have just typed does not match!\n Please try again");
			return false;
		}
	}
	
	if (strMessage == '')
	{
		return true;
	}
	else
	{
		alert("The following fields are required:\n" + strMessage);
		return false;
	}
}

</script>

<title><?php print AD_CLIENT_TITLE ?></title>
<form name="frmEditAdminUser" method="post" onsubmit="return validatePassword()">
<table class="tbl_properties" >
	<tr>
		<td class="Heading" colspan="2"><img src="images/docs_icon.gif">&nbsp;&nbsp;ADMIN USER INFORMATION: Edit</td>
	</tr>
	<tr class="tbltitle_header">
		<td colspan="2" align="left" valign="middle">&nbsp;&nbsp;<strong>Edit Client</strong></td>
	</tr>
	<tr class="tblrow1">
		<td>Username:</td>
		<td><input type="text" name="txtUsername" value="<?php print $objAdminUser -> strGetUsername() ?>" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>Password:</td>
		<td><input type="password" name="txtPassword" value="" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>Confirm Password:</td>
		<td><input type="password" name="txtConfirmPassword" value="" class="text" //></td>
	</tr>
	<tr>
		<td class="tblrow1">First Name:</td>
		<td><input type="text" name="txtFirstName" value="<?php print $objAdminUser -> strGetFirstName() ?>" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>Last Name:</td>
		<td><input type="text" name="txtLastName" value="<?php print $objAdminUser -> strGetLastName() ?>" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>User Level:</td>
		<td><?php print $objMySqlDb -> strPopulateSelectSql('cboUserLevelType', 'SELECT fulId, fulName FROM tblUserLevel ORDER BY fulName', 'fulId', 'fulName', $objAdminUser -> strGetUserLevel() ,'SELECT USER LEVEL','class="select"')?> *
		</td>
	</tr>
	<tr class="tblrow1">
		<td colspan="2" align="center">
			<input type="submit" name="btnSubmit" value="Submit" class="formbutton" //>
			<a href="admin_user_list.php"><input type="button" name="btnCancel" value="Cancel" class="formbutton"></a>
		</td>
	</tr>
</table>
</form>