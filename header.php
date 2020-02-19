<?php
include '../conf/config.php';
?>
<html>
<title>Jarvis and Kassia Venture Finance Corp.</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="scripts/style.css" />
<script type="text/javascript" src="scripts/default.js"></script>
<script type="text/javascript" src="scripts/calendarxp/agenda.js"></script>
<script type="text/javascript" src="scripts/calendarxp/normal.js"></script>
<script type="text/javascript" src="scripts/calendarxp/plugins.js"></script>

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
</script></head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div id="main_section" style="top: 176px; left: 532px; width: 105px; height: 90px; padding: 18;" class="menusectionstyle">
<a href="loans_list.php" class="menusectionitem"><nobr>Loans</nobr><br /></a>
<a href="fees_list.php" class="menusectionitem"><nobr>Fees</nobr><br /></a>
<a href="status_list.php" class="menusectionitem"><nobr>Status</nobr><br /></a>
<a href="collectors_list.php" class="menusectionitem"><nobr>Collector</nobr><br /></a>
<a href="voucher_list.php" class="menusectionitem"><nobr>Voucher</nobr><br /></a>
<a href="terms_list.php" class="menusectionitem"><nobr>Terms of Payment</nobr></a>
</div>

<div id="downloads_section" style="top: 176px; left: 391px; width: 122px; height: 90px; padding: 11;" class="menusectionstyle">
<a href="payments.php" class="menusectionitem"><nobr>Payments</nobr></a><br>
<a href="check_payments.php" class="menusectionitem"><nobr>Check Payments</nobr></a><br>
<a href="ledger.php" class="menusectionitem">Ledger</a><br>
<a href="passdue.php" class="menusectionitem">Past Due</a><br>
<a href="special_payments.php" class="menusectionitem"><nobr>Special Payments</nobr></a><br>
<a href="missed_payments.php" class="menusectionitem">Missed Payments</a>
</div>

<div id="tutorials_section" style="top: 176px; left: 118px; width: 280px; height: 230px; padding: 11;" class="menusectionstyle">
<a href="#" class="menusectionitem" onClick="window.open('ofc_voucher_info.php','','width=330, height=470')">Office Voucher</a><br>
<a href="letters/PN2.doc" class="menusectionitem">Promisory Note</a><br>
<a href="letters/Chattel.Mortgage.doc" class="menusectionitem">Chattel Mortgage</a><br>
<a href="letters/AFFIDAVIT_OF_OWNERSHIP.doc" class="menusectionitem">Affidavit of Ownership</a><br>
<a href="letters/VOLUNTARY_SURRENDER_WITH_SPECIAL_POWER_TO_SELL.doc" class="menusectionitem">Voluntary Surrender with Special Power to Sell</a><br>
<a href="letters/Letter1.doc" class="menusectionitem">Letter 1 (For Business and Salary Loan)</a><br>
<a href="letters/Letter_1_MOTOR.doc" class="menusectionitem">Letter 1 (For Motorcycle Loan)</a><br>
<a href="letters/Letter2.doc" class="menusectionitem">Letter 2 (For Business and Salary Loan)</a><br>
<a href="letters/Letter3.doc" class="menusectionitem">Letter 3 (For Business and Salary Loan)</a><br>
<a href="letters/Atty._Letter_4_current.doc" class="menusectionitem">Atty.'s Letter for Current Balance (Salary and Business Loan)</a><br>
<a href="letters/Atty._Letter_4_current__MTR_.doc" class="menusectionitem">LAtty.'s Letter for Current Balance (Motorcycle Loan)</a><br>
<a href="letters/Atty._Letter_4_Past_Due_JK.doc" class="menusectionitem">Atty.'s Letter for Past Due Accounts</a><br>
</div>

<table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td background="images/gradient_green.jpg"><img src="images/list_01.jpg" width="456" height="136" alt=""></td>
	</tr>
	<tr>
		<td bgcolor="#44602f">
			<table id="Table_01" width="515" height="40" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="12" background="images/spacer_green1.jpg" height="10"><img src="images/spacer_green1.jpg" width="10" height="10" alt="">
					</td>
					<td width="10" rowspan="2" background="images/spacer_green.jpg">&nbsp;</td>
				</tr>
				<tr>
					<td width="11"><img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<td width="88"><a href="client_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('client','','images/clients_g.gif',1)">
						<img src="images/clients_w.gif" name="client" id="client" width="94" height="30" alt=""></a></td>
					<td width="11">
						<img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<td width="100"><a href="loan_application_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('reports','','images/reports_g.gif',1), MDMG_showsection(3)">
						<img src="images/reports_w.gif" name="reports" id="reports" width="100" height="30" alt=""></a>						
					</td>
					<td width="12"><img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<td width="90"><a href="loan_application_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('transaction','','images/transaction_g.gif',1)">
						<img src="images/transaction_w.gif" name="transaction" id="transaction" width="150" height="30" alt=""></a></td>
					<td width="12"><img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<td width="90"><a href="payments.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('collection','','images/collection_g.gif',1), MDMG_showsection(2)">
						<img src="images/collection_w.gif" name="collection" id="collection" width="130" height="30" alt=""></a></td>
					<td width="12"><img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<?php if ($_SESSION['intUserLevel'] == '1') { ?>
					<td width="73"><a href="admin_user_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('admin','','images/admin_g.gif',1), MDMG_showsection(1)">
					<img src="images/admin_w.gif" name="admin" id="admin" width="73" height="30" alt=""></a></td>
					<td width="12"><img src="images/spacer_nav.jpg" width="12" height="30" alt=""></td>
					<?php } else { ?>
					<td width="73"><a href="admin_user_list.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('admin','','images/admin_g.gif',1), MDMG_showsection(1)" style="visibility:hidden">
					<?php } ?>
					<td width="217"><a href="logout.php" onMouseOut="MM_swapimgRestore()" onMouseOver="MM_swapImage('logout','','images/logout_g.gif',1)">
						<img src="images/logout_w.gif" name="logout" id="logout" width="90" height="30" alt=""></td></a>
				</tr>
			</table>
		</td>
	</tr>
	</tr>
	<tr>
		<td class="subnav">&nbsp;</td>
	</tr>
	<tr>
		<td class="subnav"><?php include 'search.php'; ?></td>
	</tr>
</table>
