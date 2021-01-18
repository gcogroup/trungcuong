<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>

<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Quản lý thông tin chung</font></td>
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
								<a href="main.php?act=info&code=00">Root</a>
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
										<td width="10"><a href="main.php?act=info&code=01"><img src="images/new_cat.png" border="0"></a></td>
										<td width="140"><a href="main.php?act=info&code=01">Th&#234;m nhóm m&#7899;i</a></td>
									</tr>
								  </table>								</td>
							  </tr>
							</table>
						</td>
					</table>
					
					</td>
				</tr>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='90%'>
							<tr>
								<td>					


<?php
require "./skin/skin_info.php";

function showlist()
{
	global $DB;
	show_info_list_h();
	$sql="Select * from info order by id_info desc";
	$a=$DB->query($sql);
	$info=array();
	while ($b=mysql_fetch_array($a))
	{
		$info['id_info']=$b['id_info'];
		$info['name']=$b['name'];
		show_info_cell($info);
	}
	show_info_list_f();
}
function showportal()
{
	show_info_post_form($info);
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
		if ($in_name)
		{
			$a=array(
					'name'=>$in_name
					);
			$a['noi_dung']=$_POST['noi_dung'];
			$a['gioi_thieu']=compile_post('gioi_thieu');	
			$a['link_video']=compile_post('link_video');	
			$b=$DB->compile_db_insert_string($a);
			$sql="INSERT INTO info (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
			$DB->query($sql);
			show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
		}
		showlist();
}
if ($_GET['code']=='03')
{
	if ($_GET['id'])
	{
		$sql="Select * from info where id_info=".$_GET['id'];
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_info']=$_GET['id'];
			$info['name']=$b['name'];
			$info['noi_dung']=$b['noi_dung'];
			$info['link_video']=$b['link_video'];
			$info['gioi_thieu']=str_replace("<br>","\n",$b['gioi_thieu']);
			show_info_update_form($info);
			//showlist();
		
		}
	
	}

}
if ($_GET['code']=='04')
{
	$in_name=compile_post('name');
	if ($in_name)
	{
		$a=array(
					'name'=>$in_name
				);
		$a['noi_dung']=$_POST['noi_dung'];
		$a['gioi_thieu']=compile_post('gioi_thieu');
		$a['link_video']=compile_post('link_video');				
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE info SET ".$b." WHERE id_info=".$_GET['id'];
		$DB->query($sql);
		show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
	}
	else
	{
		show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
	}
	showlist();

}
if ($_GET['code']=='05')
{
	if (@$_GET['id'])
	{
		$sql="Delete from info where id_info=".$_GET['id'];
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		showlist();
	}

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