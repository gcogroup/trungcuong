<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );

?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Người quản lý</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
					<tr>
						<td width="50%">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
							<tr>
								<td width="10">&nbsp;</td>
								<td width="10"><img src='images/homeicon.gif' border='0'></td>
								<td width="3">&nbsp;</td>
								<td>
									<a href="main.php?act=users&code=00">Danh s&#225;ch ng&#432;&#7901;i qu&#7843;n tr&#7883;</a>
								</td>
							</tr>
							</table>
						</td>					
					
						<td width="50%" align="right">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
							<tr>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=users&code=01"><img src="images/new_news.png" border="0"></a></td>
										<td width="180"><a href="main.php?act=users&code=01">Th&#234;m ng&#432;&#7901;i s&#7917; d&#7909;ng m&#7899;i</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>						
							</tr>
							
							</table>
						</td>
					</tr>
					</table>
					
					</td>
				</tr>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='98%'>
							<tr>
								<td>					

<?php
require "./skin/skin_users.php";
function showlist()
{
	global $DB;
	show_users_list_h();
	$sql="Select * from users order by id_users desc";
	$a=$DB->query($sql);
	$info=array();
	$i=0;
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['id_users']=$b['id_users'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Deactive";
		else
			$info['status']="Active";
		$info['name']=$b['name'];
		$info['username']=$b['username'];
		$info['email']=$b['email'];
		$info['telephone']=$b['telephone'];
	

		if ($b['super'])
		{
			$info['modules']="<font color='#ff0000'><b><center>Super Admin</center></b></font>";
		}
		else
		{
			$info['modules']="";
			$sql="select m.name as module_name from user_module as um inner join module as m on (um.id_module=m.id_module) where um.id_user=".$b['id_users'];
			$x=$DB->query($sql);
			while ($y=mysql_fetch_array($x))
			{
				$info['modules'].="&nbsp;-&nbsp;".$y['module_name']."<br>";
			}
		}
		show_users_cell($info);
	}
	show_users_list_f();


}
function showportal()
{
	showlist();
}	
if ($_GET['code']=='00')
{
	showlist();
}
if ($_GET['code']=='01')
{
	$sql="select * from module order by thu_tu asc,id_module desc";
	$a=$DB->query($sql);
	$info['module_rows']='';
	while ($b=mysql_fetch_array($a))
	{
		$info['module_rows'].="<input type='checkbox' name='modules[]' class='noborder' value='".$b['id_module']."'>&nbsp;&nbsp;".$b['name']."<br>";
	}

	show_users_post_form($info);
}
if ($_GET['code']=='02')
{
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		if ($password!=$password2)
		{
			show_message("M&#7853;t kh&#7849;u kh&#244;ng tr&#249;ng nhau ! H&#227;y nh&#7853;p l&#7841;i th&#244;ng tin !");
		}
		else
		{
			$in_name=compile_post('name');
			$a=array(
					'name'=>$in_name
					);
			$a['username']=compile_post('username');
			$a['password']=md5(compile_post('password'));
			$a['email']=compile_post('email');
			$a['telephone']=compile_post('telephone');
			$a['active']=compile_post('active');
			if(compile_post('super'))
			{
			$a['super']=compile_post('super');
			}	
			$b=$DB->compile_db_insert_string($a);
			$sql="INSERT INTO users (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
			$DB->query($sql);
			$idinsert=mysql_insert_id();
			$a=array();
			if ($idinsert)
			{
				$a['id_user']=$idinsert;
				$count=count($_POST['modules']);
				if ($count>0)
				{
					for ($i=0;$i<$count;$i++)
					{
						$a['id_module']=$_POST['modules'][$i];
						$b=$DB->compile_db_insert_string($a);
						$sql="INSERT INTO user_module (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
				}
			}
			show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		}
		//showportal();
		showlist();
}
if ($_GET['code']=='03')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from users where id_users=".$id;
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_users']=$id;
			$info['name']=$b['name'];
			$info['username']=$b['username'];
			$info['thu_tu']=$b['thu_tu'];
			$info['active']=$b['active'];
			if ($info['active'])
				$info['active']="checked";
			$info['super']=$b['super'];
			if ($info['super'])
				$info['super']="checked";
			
			$info['email']=$b['email'];
			$info['telephone']=$b['telephone'];
			$sql="select * from user_module where id_user=".$b['id_users'];
			$x=$DB->query($sql);
			$i=0;
			$modules=array();
			while ($y=mysql_fetch_array($x))
			{
				$modules[$i]=$y['id_module'];
				$i++;
			}
			
			$sql="select * from module order by thu_tu asc,id_module desc";
			$x=$DB->query($sql);
			$info['module_rows']='';
			while ($y=mysql_fetch_array($x))
			{
				$info['module_rows'].="<input type='checkbox' name='modules[]' class='noborder' value='".$y['id_module']."'";
				if (in_array($y['id_module'],$modules))
					$info['module_rows'].=" checked ";
				$info['module_rows'].=">&nbsp;&nbsp;".$y['name']."<br>";
			}
			
			
			show_users_update_form($info);
			showlist();
		
		}
	
	}

}
if ($_GET['code']=='04')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$in_name=compile_post('name');
		$a=array(
					'name'=>$in_name
				);
		$a['email']=compile_post('email');		
		$a['telephone']=compile_post('telephone');
		$a['active']=compile_post('active');
		if(compile_post('super'))
		{
		$a['super']=compile_post('super');
		}
		$a['username']=compile_post('username');
		
		$a['password']=md5(compile_post('password'));
				
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE users SET ".$b." WHERE id_users=".$id;
		$DB->query($sql);
		
		$sql="select * from user_module where id_user=".$id;
		$x=$DB->query($sql);
		$i=0;
		$modules=array();
		while ($y=mysql_fetch_array($x))
		{
			$modules[$i]=$y['id_module'];
			$i++;
			
		}				
		$idinsert=$id;
		$a=array();
		if ($idinsert)
		{
			$a['id_user']=$idinsert;
			$count=count($_POST['modules']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules'][$i],$modules);
					if (!in_array($_POST['modules'][$i],$modules))
					{
						$a['id_module']=$_POST['modules'][$i];
						$b=$DB->compile_db_insert_string($a);
						$sql="INSERT INTO user_module (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules[$id_module_search]=0;
					}
				}
			}
			$count=count($modules);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules[$i])
					{
						$sql="delete from user_module where id_user=".$id." and id_module=".$modules[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
	}
	//showportal();
	showlist();

}
if ($_GET['code']=='05')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Delete from user_module where id_user=".$id;
		$DB->query($sql);	
		$sql="Delete from users where id_users=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		//showportal();
		showlist();
	}

}
if ($_GET['code']=='08')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Active')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE users SET ".$b." WHERE id_users=".$id;
		$DB->query($sql);
		show_message("Bạn đã có quyền quản lý !");
	}
	if ($opt=='Deactive')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE users SET ".$b." WHERE id_users=".$id;
		$DB->query($sql);
		show_message("Người quản lý này đã bị khóa !");
	}
	showlist();		
}
?>
								<br><br>
								</td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>