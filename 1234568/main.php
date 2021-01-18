<?php
session_name( 'TTHadmin' );
session_start();
error_reporting  (E_ERROR | E_WARNING | E_PARSE);
//error_reporting (E_ALL); //report all error and notice

define('_VALID_TTH','1');
require( "initcms.php" );
// must start the session before we create the mainframe object
if ($_SESSION["session_username"] && $_SESSION["session_usertype"] && $_SESSION["session_user_id"] && $_SESSION["session_logintime"])
{
//START

	$username=clean_value($_SESSION["session_username"]);
	$id_users=intval($_SESSION["session_user_id"]);
	$super=0;
	if ($_SESSION["session_usertype"]=='super')
	{
		$super=1;
	}
	if ($_SESSION["session_usertype"]=='normal')
	{
		$super=0;
	}
	
	$sql="select * from users where id_users=".$id_users." and username='".$username."' and super=".$super;
	$uu=$DB->query($sql);
	if ($vv=mysql_fetch_array($uu))
	{
	
		$my['username']=$_SESSION["session_username"];
		$my['id']=$_SESSION["session_user_id"];
		$my['usertype']=$_SESSION["session_usertype"];
		$my['session_logintime']=$_SESSION["session_logintime"];
		$my['name']=$vv['name'];
		
		//check permission
		$modules_permission=array();
		if ($_SESSION["session_usertype"]=='super')
		{
			$sql="select * from module";
			$a=$DB->query($sql);
			$i=0;
			while ($b=mysql_fetch_array($a))
			{
				$modules_permission[$i]=$b['gia_tri'];
				$i++;
			}
			$modules_permission[$i]='users.php';
			$i++;
			$modules_permission[$i]='myadmin.php';
			$i++;
			
		}
		if ($_SESSION["session_usertype"]=='normal')
		{
			$sql="select m.gia_tri from user_module as um inner join module as m on (um.id_module=m.id_module) where um.id_user=".intval($_SESSION["session_user_id"]);
			$a=$DB->query($sql);
			$i=0;
			while ($b=mysql_fetch_array($a))
			{
				$modules_permission[$i]=$b['gia_tri'];
				$i++;
			}
			$modules_permission[$i]='myadmin.php';
			$i++;
			
		}
		
		require "skin/skin.php";
		
		show_admin_header();	
		$act=$_GET['act'];
		if (!$act)
		{
			include('welcome.htm');
		}
		else
		{
			if (@$act=='logout')
			{
				session_unset();
				session_destroy();
				redir("index.php");
			}
			else
			{	
				$path="$act.php";
				//xac dinh quyen truy cap voi tung module
				if (in_array($path,$modules_permission))
				{	
					if (file_exists("./".$path)) 
					{
						include("./".$path);
					}
				}
				else
				{
					show_message("B&#7841;n kh&#244;ng &#273;&#7911; th&#7849;m quy&#7873;n &#273;&#7875; truy nh&#7853;p v&#224;o ph&#7847;n n&#224;y !<br>H&#227;y li&#234;n h&#7879; v&#7899;i ng&#432;&#7901;i qu&#7843;n tr&#7883; !");
				}
			}
		}	
		show_admin_footer();
	}
	else
	{
		session_unset();
		@session_destroy();
		redir("index.php");
	}
}
else
{
	session_unset();
 	@session_destroy();
   	redir("index.php");
}

require( "endcms.php" );
?>