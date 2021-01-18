<?php
session_cache_limiter('none');
session_name( 'TTHadmin' );
session_start();

//error_reporting  (E_ERROR | E_WARNING | E_PARSE);
//error_reporting (E_ALL);
define('_VALID_TTH','1');
require( "initcms.php" );

$username = addslashes(compile_post('username'));
$password = addslashes(compile_post('password'));

if (@$_GET['act']=="logout") 
{
  session_unset();
  session_destroy();
  redir("index.php");
}

$_SESSION["{$session_name}"] = time();
		
if (@$_POST['submit'])
{
	
    if ($username && $password)
	{
		$password=addslashes(md5($password));
		
		$result = $DB->query("select id_users,username,password,super from users where username='$username' and password='$password'");
	
		if(mysql_num_rows($result)>0) 
		{
			$a=mysql_fetch_array($result);
			$my['username']=$username;
			$my['id']=$a['id_users'];
			if ($a['super']==1)
			{
				$my['usertype']="super";
				$_SESSION["usertype"] = 1 ;
			}
			else
			{
				$my['usertype']="normal";
				$_SESSION["usertype"] = 2 ;
			}
			$logintime = time();
			$_SESSION["session_username"] = $my['username'];
			$_SESSION["session_usertype"] = $my['usertype'];
							
			$_SESSION["session_user_id"] = $my['id'];
			$_SESSION["session_logintime"] = $logintime;
			session_write_close();
			$sql="update users set lastvisit='".$logintime."' where id_users=".$my['id'];
			mysql_query($sql);		
			//chuyen toi trang main.php
			echo '
				<html>
				
				<head>
				<title>Administrator Area</title>
				</head>
				
				<frameset rows="64">
					<frame name="main" src="main.php">
				  <noframes>
				  <body>
				
				  <p>This page uses frames, but your browser doesn not support them.</p>
				
				  </body>
				  </noframes>
				</frameset>
				
				</html>			
			';
			//redir("main.php");
			die();
		} 
		else 
		{	
			echo "<script>
			
			alert('Có lỗi trong qúa trình đăng nhập, bạn hãy thử lại !');
			document.location.href='index.php';
			
			</script>\n";

			session_unset();
			@session_destroy();			
			exit();
		}
	}
	else
	{
		echo "<script>alert('Bạn hãy điền tên và mật khẩu truy cập'); 
		document.location.href='index.php';
		</script>\n";
		session_unset();
		@session_destroy();			
		exit();	
	}

}
else 
{

?>
<html>
<head>
<title>Admin Login</title>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK href="style.css" rel=Stylesheet type=text/css>

</HEAD>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" onLoad="document.frmlogin.username.focus();">


<TABLE id=Table1 height="100%" cellSpacing=0 cellPadding=0 width="100%" 
align=center border=0>
  <TBODY>
  <TR>
    <TD>
      <P>
      
      <TABLE width="530" height="138" border=1 align=center cellPadding=0 
      cellSpacing=0 bordercolor="#CCCCCC" id=Table2 style="BORDER-COLLAPSE: collapse">
        <TBODY>
        <TR>
          <TD valign="top"><FORM action="index.php" method=post name="frmlogin" >
            <table width="100%" border="0" cellpadding="3" cellspacing="3">
              <tr>
                <td height="30" bgcolor="#E5E5E5"><div align="center"><STRONG><FONT color=#ff6600>&#272;&#259;ng Nh&#7853;p H&#7879; Th&#7889;ng</FONT></STRONG></div></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="1" bgcolor="#CCCCCC"><img src="images/space.gif" width="1" height="1"></td>
              </tr>
            </table>
            <TABLE id=Table1 style="BORDER-COLLAPSE: collapse" 
            borderColor=#cfe6e4 cellSpacing=0 cellPadding=0 width=400 
            align=center border=0>
              <TBODY>
              
              <TR>
                <TD width="20%" height="40" style="WIDTH: 114px">
                  <P align=right>T&#234;n truy c&#7853;p :</P></TD>
                <TD><input name='username' type='text' class="addentrybody" size='30'><BR></TD></TR>
              <TR>
                <TD height="40" style="WIDTH: 114px">
                  <P align=right>M&#7853;t kh&#7849;u :</P></TD>
                <TD><input name='password' type='password' class="addentrybody" size='30'><BR></TD></TR>
				
                <TD style="WIDTH: 114px"></TD>
                <TD><input name='submit' type='submit' class="blue" value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' class="blue" value='Nh&#7853;p l&#7841;i'></TD></TR></TABLE>
          </form>
            <TABLE id=Table3 cellSpacing=5 cellPadding=3 width=400 align=center 
            border=0>
              <TBODY>
              <TR>
        <TD></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></P></TD></TR></TBODY></TABLE>




</body>
</html>

<?php 
} 	
require( "endcms.php" );
?>