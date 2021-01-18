<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Module Manager</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='100%'>
					<tr>
						<td width="100%" align="right">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC'>
							<tr>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC'>
									<tr>
										<td width="10"><a href="main.php?act=module&code=01"><img src="images/new_news.png" border="0"></a></td>
										<td width="120"><a href="main.php?act=module&code=01">Th&#234;m module m&#7899;i</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>						
							</tr>
							
							</table>
						</td>
					</table>
					
					</td>
				</tr>
	
	
	<tr>
		<td align="center">
			<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='100%'>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='90%'>
							<tr>
								<td>					

<?php
require "./skin/skin_module.php";
function showlist()
{
	global $DB;
	show_module_list_h();
	$sql="Select * from module order by thu_tu asc,id_module desc";
	$a=$DB->query($sql);
	$info=array();
	$i=0;
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['id_module']=$b['id_module'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Deactive";
		else
			$info['status']="Active";
		$info['name']=$b['name'];
		$info['gia_tri']=$b['gia_tri'];
		show_module_cell($info);
	}
	show_module_list_f();
}
function showportal()
{
	show_module_post_form();
	showlist();
}	
if ($_GET['code']=='00')
{
	showlist();
}
if ($_GET['code']=='01')
{
	showportal();
}
if ($_GET['code']=='02')
{
		$in_name=compile_post('name');
		$a=array(
				'name'=>$in_name
				);
		$a['gia_tri']=compile_post('gia_tri');
		$a['thu_tu']=compile_post('thu_tu');
		$a['active']=compile_post('active');
			
		$b=$DB->compile_db_insert_string($a);
		$sql="INSERT INTO module (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
		$DB->query($sql);
		show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		//showportal();
		showlist();
}
if ($_GET['code']=='03')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from module where id_module=".$id;
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_module']=$_GET['id'];
			$info['name']=$b['name'];
			$info['thu_tu']=$b['thu_tu'];
			$info['active']=$b['active'];
			if ($info['active'])
				$info['active']="checked";
				
			$info['gia_tri']=$b['gia_tri'];
			show_module_update_form($info);
			showlist();
		
		}
	
	}

}
if ($_GET['code']=='04')
{
	$id=intval($_GET['id']);
	$in_name=compile_post('name');
	$a=array(
				'name'=>$in_name
			);
	$a['gia_tri']=compile_post('gia_tri');		
	$a['thu_tu']=compile_post('thu_tu');
	$a['active']=compile_post('active');
			
	$b=$DB->compile_db_update_string($a);
	$sql="UPDATE module SET ".$b." WHERE id_module=".$id;
	$DB->query($sql);
	show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
	//showportal();
	showlist();

}
if ($_GET['code']=='05')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Delete from module where id_module=".$id;
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
	$a = array() ;
	if ($opt=='Active')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE module SET ".$b." WHERE id_module=".$id;
		$DB->query($sql);
		show_message("Module đã được kích hoạt !");
	}
	if ($opt=='Deactive')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE module SET ".$b." WHERE id_module=".$id;
		$DB->query($sql);
		show_message("Module đã bị khóa !");
	}
	showlist();		
}

if ($_GET['code']=='09')
{
	$sql="Select * from module order by thu_tu asc,id_module desc";
	$c=$DB->query($sql);
	$a=array();
	$i=0;
	while ($d=mysql_fetch_array($c))
	{
		$thu_tu=compile_post('thu_tu_'.$d['id_module']);
		if ($thu_tu!=$d['thu_tu'])
		{
			$a['thu_tu']=$thu_tu;
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE module SET ".$b." WHERE id_module=".$d['id_module'];
			$DB->query($sql);
		}
	}
	show_message("Thay đổi thứ tự hiển thị thành công !");
	showlist();
}
?>
								<br></td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>