<?php
include 'header.php';
$objAdminUser = new AdminUser();
$objMySqlDb = new MySqlDb();

if (isset($_POST['btnSubmit']) || isset($_POST['btnSubmit_x']))
{
	$objAdminUser -> voidSetUserLevelId($_POST['cboUserLevelType']);
	$objAdminUser -> voidSetUsername($_POST['txtUsername']);
	$objAdminUser -> voidSetPassword($_POST['txtPassword']);
	$objAdminUser -> voidSetFirstName($_POST['txtFirstName']);
	$objAdminUser -> voidSetLastName($_POST['txtLastName']);
	if ($objAdminUser -> intInsertAdminUser())
	{
		General::voidRedirectUrl('admin_user_list.php');
	}
}

?>
<script type="text/javascript">
function validatePassword()
{
	var strMessage = '';
	if (document.frmAddAdminUser.txtUsername.value == "")
	{
		strMessage += "Username\n";
	}
	if (document.frmAddAdminUser.txtFirstName.value == "")
	{
		strMessage += "First Name\n";
	}
	if (document.frmAddAdminUser.txtLastName.value == "")
	{
		strMessage += "Last Name\n";
	}
	if (document.frmAddAdminUser.txtPassword.value != "")
	{
		if (document.frmAddAdminUser.txtPassword.value == document.frmAddAdminUser.txtConfirmPassword.value)
		{
			return true;
		}
		else
		{
			alert("The Passwords you have just typed does not match!\n Please try again");
			return false;
		}
	}
	else
	{
		strMessage += "Password\n";
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
<form name="frmAddAdminUser" method="post" onsubmit="return validatePassword()">
<table class="tbl_properties" >
	<tr>
		<td class="Heading" colspan="2"><img src="images/docs_icon.gif">&nbsp;&nbsp;ADMIN USER INFORMATION: Add</td>
	</tr>
	<tr class="tbltitle_header">
		<td colspan="2" align="left" valign="middle">&nbsp;&nbsp;<strong>Add Admin User</strong></td>
	</tr>
	<tr class="tblrow1">
		<td width="124">Username:</td>
		<td width="194"><input type="text" name="txtUsername" value="" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>Password:</td>
		<td><input type="password" name="txtPassword" value="" class="text" //></td>
	</tr>
	<tr class="tblrow1">
		<td>Confirm Password:</td>
		<td><input type="password" name="txtConfirmPassword" value="" class="text"  //></td>
	</tr>
	<tr class="tblrow1">
		<td>First Name:</td>
		<td><input type="text" name="txtFirstName" value="" class="text"  //></td>
	</tr>
	<tr class="tblrow1">
		<td>Last Name:</td>
		<td><input type="text" name="txtLastName" value="" class="text"  //></td>
	</tr>
	<tr class="tblrow1">
		<td>User Level:</td>
		<td><?php print $objMySqlDb -> strPopulateSelectSql('cboUserLevelType', 'SELECT fulId, fulName FROM tblUserLevel ORDER BY fulName', 'fulId', 'fulName', '' ,'SELECT USER LEVEL','class="select"')?> *
		</td>
	</tr>
	<tr class="tblrow1">
		<td colspan="2" align="right">
			<input type="submit" name="btnSubmit" value="Submit" class="formbutton" //>
			<input type="button" name="btnCancel" value="Cancel" class="formbutton" onclick="location.href='admin_user_list.php'" //>
		</td>
	</tr>
</table>
</form>