<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">C&#7845;u h&#236;nh h&#7879; th&#7889;ng</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='100%'>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='90%'>
							<tr>
								<td>					

<?php
require "skin/skin_settings.php";
function show_settings_form()
{
	global $info,$DB;
	$info=array();
	$sql="Select * from settings";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$info[$b['setting_name']]=$b['setting_value'];
	}
		if (!$info['root_path'])
		{
			$info['root_path']=$_SERVER['DOCUMENT_ROOT']."/";
		}
		if (intval($info['use_smtp']))
		{
			$info['use_smtp_yes']='checked';
		}
		else
		{
			$info['use_smtp_no']='checked';
		}		
		if (intval($info['gz_compress']))
		{
			$info['gz_compress_yes']='checked';
		}
		else
		{
			$info['gz_compress_no']='checked';
		}
		
		$info['time_offset']=intval($info['time_offset']);
		$info['select_time_offsets']="<select name='setting_item[time_offset]'>";
		for ($i=-12;$i<=12;$i++)
		{
			$info['select_time_offsets'].="\n<option value='".$i."'";
			if ($info['time_offset']==$i)
				$info['select_time_offsets'].=" selected";
			$info['select_time_offsets'].=">".$i."</option>";
		}
		$info['select_time_offsets'].="\n</select>";
		if (intval($info['upload_mode'])==1)
		{
			$info['upload_mode_1']='checked';
		}
		if (intval($info['upload_mode'])==2)
		{
			$info['upload_mode_2']='checked';
		}
		if (intval($info['upload_mode'])==3)
		{
			$info['upload_mode_3']='checked';
		}
		$info['id_country']=intval($info['id_country']);
		$sql="select * from country order by id_country asc";
		$x=$DB->query($sql);
		$info['country_options']='';
		while ($y=mysql_fetch_array($x))
		{
			$info['country_options'].="<option value='".$y['id_country']."'";
			if ($info['id_country']==$y['id_country'])
			{
				$info['country_options'].=" selected";
			}
			$info['country_options'].=">".$y['name']."</option>";
		}
	
	show_settings_update_form($info);
}
if ($_GET['code']=='00' || !$_GET['code'])
{
	show_settings_form();
}
if ($_GET['code']=='04')
{
	$setting_item = $_POST['setting_item'];
	foreach ($setting_item as $key => $val) {
		$val = clean_value(trim($val));
		$sql = "UPDATE settings 
				SET setting_value = '$val' 
				WHERE setting_name = '$key'";
		$DB->query($sql);
	}
	
	show_message("Th&#244;ng tin c&#7845;u h&#236;nh &#273;&#227; &#273;&#432;&#7907;c thay &#273;&#7893;i !");
	show_settings_form();

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