<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );

function show_admin_header()
{
global $my,$modules_permission;
echo <<<EOT
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrator Area</title>
<script language="JavaScript" src="../lib/viettyping.js"></script>
<script language="javascript">
function sure(){
	i=confirm("Xo'a mu.c du.oc cho.n ?!!");
	if(i==0){
		return false;
	}
}
</script>
<script language=javascript>
	function confirmdelete(id)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=05&id='+id;
	}
</script>
<SCRIPT language=JavaScript1.2 type=text/javascript>
	function newWindow (str) {
		window.open(str,'','');	
		//document.forms[0].my_go.value = 'no';	
		return false;

	}
//NavBar
function navBar( tableCellRef, hoverFlag, navStyle ) {
	if ( hoverFlag ) {
		switch ( navStyle ) {
			case 1:
//This defines rollover color
				tableCellRef.style.backgroundColor = '#ECEEF1';
				break;
			default:
//tableCellRef.style.backgroundColor = '#ccc';
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#fff000';
				}
		}
	} else {
		switch ( navStyle ) {
			case 1:
//This defines return color
				tableCellRef.style.backgroundColor = '';
				break;
			default:
//tableCellRef.style.backgroundColor = '#ddd';
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#00ff89';
				}
		}
	}
}
</SCRIPT>
<LINK REL=STYLESHEET TYPE='text/css' HREF='style.css'>
<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>
<script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
  <tr>
    <td valign="top">

<table border="0" width="100%" cellspacing="0" cellpadding="0" >
EOT;


echo '
<tr>
        <td height="94" valign="top">
        <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0" >
        <tr>
				<td width="343" background="images/banner.jpg" valign="bottom" style="padding-bottom:4px">
';
if ($my)
{
        echo '
        <font style="font-size:9pt" color="red">&nbsp;&nbsp;&nbsp;&nbsp;Login as: '.$my['name'].'
        [<b>'.$my['username'].'</b>]
        </font>
        ';
}
echo '
        &nbsp;
				
				</td>
                <td valign="bottom" background="images/duoi.jpg" align="right" style="padding-bottom:4px">
				<font style="font-size:12px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#FF0000">Liên hệ cả Admin : </font><strong>0974 83 6866</strong>
                <font color="#ffffff">&nbsp;&nbsp;
                <a href="main.php" class="trang"><font color="#FF0000">Trang ch&#237;nh</font></a><font color="#000000"> |</font>
';
if ($my)
{
        echo '
        <a href="main.php?act=logout" class="trang"><font color="#FF0000">Tho&#225;t</font></a>
        ';
}
else
{
        echo '
        <a href="main.php?act=login" class="trang">&#272;&#259;ng nh&#7853;p</a>
        ';
}

echo '
                </font>&nbsp;&nbsp;
                </td>
        </tr>
        </table>
        </td>
</tr>

';

echo '
<tr>
	<td background="images/bgtopmenu.gif" height="34">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" height="34">
  <tr>
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"      H&#7879; th&#7889;ng      ","","",-1,-1,0,"#","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_bpx("p1","p0",[1,4,0,2,0,4,0,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.50)",5,"",-2,60,2,3,"#cccccc","transparent","tbbg5.gif",3,1,1]);
';
if (in_array('settings.php',$modules_permission))
{
echo '
stm_aix("p1i0","p0i0",[0,"C&#7845;u h&#236;nh h&#7879; th&#7889;ng                   ","","",-1,-1,0,"main.php?act=settings&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#333333"]);
';
}
if (in_array('module.php',$modules_permission))
{
echo '
stm_aix("p1i0","p0i0",[0,"Qu&#7843;n l&#253; c&#225;c module                   ","","",-1,-1,0,"main.php?act=module&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#333333"]);
';
}

echo
'
stm_ep();
stm_ep();
stm_em();
//-->
</script>
	</td>
';




echo '
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"     Database     ","","",-1,-1,0,"#","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_bpx("p1","p0",[1,4,0,2,0,4,0,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.50)",5,"",-2,60,2,3,"#cccccc","transparent","tbbg5.gif",3,1,1]);
';

if (in_array('dbadmin.php',$modules_permission))
{
echo '
stm_aix("p1i0","p0i0",[0,"Backup                    ","","",-1,-1,0,"main.php?act=dbadmin&task=dbBackup","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#333333"]);
stm_aix("p1i1","p1i0",[0,"Restore            ","","",-1,-1,0,"main.php?act=dbadmin&task=dbRestore"]);
stm_aix("p1i2","p1i0",[0,"Query            ","","",-1,-1,0,"main.php?act=dbadmin&task=xquery"]);
';
}
echo
'
stm_ep();
stm_ep();
stm_em();
//-->
</script>
	</td>
';



echo '
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"  Quản lý giới thiệu ","","",-1,-1,0,"main.php?act=info&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_bpx("p1","p0",[1,4,0,2,0,4,0,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.50)",5,"",-2,60,2,3,"#cccccc","transparent","tbbg5.gif",3,1,1]);
';

echo
'
stm_ep();
stm_ep();
stm_em();
//-->
</script>
	</td>
';

echo '
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"  Quản lý sản phẩm ","","",-1,-1,0,"main.php?act=catpd&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_bpx("p1","p0",[1,4,0,2,0,4,0,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.50)",5,"",-2,60,2,3,"#cccccc","transparent","tbbg5.gif",3,1,1]);
';

echo
'
stm_ep();
stm_ep();
stm_em();
//-->
</script>
	</td>
';


echo '
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"     Ch&#7913;c n&#259;ng kh&#225;c      ","","",-1,-1,0,"#","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_bpx("p1","p0",[1,4,0,2,0,4,0,0,90,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.50)",5,"",-2,60,2,3,"#cccccc","transparent","tbbg5.gif",3,1,1]);
';

if (in_array('catlg.php',$modules_permission))
{
echo '
stm_aix("p1i0","p0i0",[0,"Qu&#7843;n l&#253; thông tin chung             ","","",-1,-1,0,"main.php?act=catlg&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#333333"]);
';
}


if (in_array('contact.php',$modules_permission))
{
echo '
stm_aix("p1i0","p0i0",[0,"Quản lý liên hệ        ","","",-1,-1,0,"main.php?act=contact&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#333333"]);
';
}


echo
'
stm_ep();
stm_ep();
stm_em();
//-->
</script>
	</td>
';


if (in_array('users.php',$modules_permission))
{
echo '
<td width="10" valign="top" style="padding-top: 3">&nbsp;</td>
    <td width="20" valign="top" style="padding-top: 3">
<script type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["menu6984",400,"","blank.gif",0,"","",0,0,0,0,50,1,0,0,""],this);
stm_bp("p0",[0,4,0,0,0,2,0,0,78,"",-2,"",-2,90,0,0,"#7f7f7f","transparent","",3,0,0,"#0094EA"]);
stm_ai("p0i0",[0,"    Ng&#432;&#7901;i qu&#7843;n lý     ","","",-1,-1,0,"main.php?act=users&code=00","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"tbbg5.gif","tbbg5.gif",3,3,1,1,"#ffffff","#0094EA","#000000","#0094EA","bold 9pt Arial","bold 9pt Arial",0,0]);
stm_ep();
stm_em();
//-->
</script>
	</td>
';
}


echo '	
  </tr>
</table>	
	
	</td>
</tr>
</table>


</td></tr>
<tr><td valign="top" height="100%">

<table border="0" cellpadding="0" cellspacing="10" style="border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080" bordercolor="#111111" width="100%" height="100%">
  <tr>
    <td valign="top" bordercolor="#000080">

';

}

function show_admin_footer()
{
echo <<<EOT
</td>
  </tr>
</table>

</td></tr>
<tr><td>
<table border="0" width="100%" cellspacing="0" cellpadding="0" >
<tr>
	<td background="images/bottom4.gif" height="28" valign="bottom" align="center">&nbsp;
    </td>
</tr>
</table>
</td></tr>
</table>
</body>
<div style="display:none">
<img src="blank.gif">
<img src="tbbg5.gif">
</div>
</html>

EOT;

}
function show_message($str)
{
echo "
<br>
<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse' bordercolor='#3333CC' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' align='center' style='font-family: Arial; font-size: 10pt; color: #FF0000'>$str</td>
  </tr>
</table>
<br>
";
}
?>