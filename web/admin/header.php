<?php
include '../../conf/admin/config.php';
?>
<html>
<title><?php print AD_CLIENT_TITLE ?></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="../scripts/style.css" />
<script type="text/javascript" src="../scripts/default.js"></script>
<script type="text/javascript" src="../scripts/nicEdit.js"></script>

<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

//-->
<!--
function MM_swapimgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body>
<table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td background="images/header_banner.png"><img src="images/header_banner.png"></td>
	</tr>
		<tr>
		<td>
			<table id="Table_01" height="40" border="0" cellpadding="0" cellspacing="2px">
				<tr>
					<td colspan="12" background="images/spacer_green1.jpg" height="5"><img src="images/spacer_green1.jpg" width="10" height="5" alt=""></td>
					
				</tr>
				<tr>
					<td><a href="profile.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('profile','','images/profile_white.png',1)">
						<img src="images/profile.png" name="profile" id="profile" height="30" alt=""></a></td>
					<td><a href="experience-list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('experience','','images/experience_white.png',1)">
						<img src="images/experience.png" name="experience" id="experience" height="30" alt=""></a></td>
					<td><a href="portfolio-list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('portfolio','','images/portfolio_white.png',1)">
						<img src="images/portfolio.png" name="portfolio" id="portfolio" height="30" alt=""></a></td>
					<td><a href="interest.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('interest','','images/interests_white.png',1)">
						<img src="images/interests.png" name="interest" id="interest" height="30" alt=""></a></td>
					<?php if ($_SESSION['intUserLevel'] == '1') { ?>
					<td><a href="admin_user_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('users','','images/users_white.png',1)">
					<img src="images/users.png" name="users" id="users" alt="" height="30"></a></td>
					<?php } else { ?>
					<td><a href="admin_user_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('users','','images/users_white.png',1)">
					<?php } ?>
					<td><a href="logout.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('logout','','images/logout_white.png',1)">
					<img src="images/logout.png" name="logout" id="logout" alt="" height="30"></a></td>
					<td class="subnav_username"><?php print "Welcome back ". $_SESSION['strUsername'];  ?></td>
				</tr>
			</table>
		</td>
	</tr>
	</tr>
	<tr>
		<td class="subnav">&nbsp;</td>
	</tr>
	
</table>
</body>
</html>
