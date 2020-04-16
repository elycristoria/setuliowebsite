<?php
session_start();
//error_reporting(E_ERROR | E_PARSE | E_WARNING);
//ini_set(error_reporting,E_ALL);
require_once '../../Kernel.php';
/* Constants */
define('AD_DB_HASH_KEY', 'Setu Lio');
define('AD_CLIENT_TITLE', 'Setu Lio Official Web Administration Page');

//constant information about the database
define('AD_DB_HOST', "localhost");
define('AD_DB_NAME', "dbSetu");
define('AD_DB_USER', "root");
define('AD_DB_PASSWD', "");

/* Libraries */
require_once('../../lib/general.class.php');
require_once('../../lib/database.class.php');
require_once('../../lib/session.class.php');
require_once('../../lib/data_list.class.php');
require_once('../../lib/filters.class.php'); 
require_once('../../lib/admin_users.class.php'); 
require_once('../../lib/profile.class.php');  
require_once('../../lib/portfolio.class.php');
require_once('../../lib/experience.class.php');

//$iOldErrorReportingLevel = error_reporting(error_reporting() & !E_STRICT); 
//error_reporting($iOldErrorReportingLevel);

/* database connection */
$objDbConn  = new MysqlDb();
$objDbConn  -> voidInitialize(AD_DB_HOST, AD_DB_USER, AD_DB_PASSWD, AD_DB_NAME);
$objDbConn  -> voidConnect();

/* Session */ 
$objSession = new Session();
$arrSessionLoginVars = array('intAdminUserId', 'strUsername', 'strFirstName', 'strLastName', 'intUserLevel');
//print $_SERVER['PHP_SELF'];
if ($_SERVER['PHP_SELF'] == '/setulio.com/web/admin/index.php')
{
	if ($objSession -> blnIsVariableSet($arrSessionLoginVars))
	{
		if ($objSession -> blnIsSessionKeyRegistered(AD_DB_HASH_KEY, $_SESSION['intAdminUserId']))
		{
			//commented for a while
			if ($_SESSION['intUserLevel'] == '3')
			{
				General::voidRedirectUrl('/collector/collectors_client.php');
			}
			else
			{
				General::voidRedirectUrl('profile.php'); 
			}
		}
	}
}

/*else
{
	if ($objSession -> blnIsVariableSet($arrSessionLoginVars))
	{
		if (!$objSession -> blnIsSessionKeyRegistered(AD_DB_HASH_KEY, $_SESSION['intAdminUserId']))
		{
			General::voidRedirectUrl('profile.php');
		}
	}
	else
	{
		General::voidRedirectUrl('index.php');
	}
}*/



?>
