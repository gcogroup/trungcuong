<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this locatlgion is not allowed.' );
?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Qu&#7843;n l&#253; thông tin chung</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
					<tr>
						<td width="50%">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='100%'>
							<tr>
								<td width="10">&nbsp;</td>
								<td width="10"><img src='images/homeicon.png' width="24" height="24" border='0'></td>
								<td width="3">&nbsp;</td>
								<td>
								<?php
								require "../lib/catlg_tree.php";
								$navigator="<a href='main.php?act=catlg&pid=0'>Root</a> > ";
								$dk=intval($_GET['pid']);
								$ct=new catlg_tree($dk);
								$ct->get_catlg_tree();	
								$ct->get_catlg_string_admin($dk);
								$navigator.=$catlgstring2;								
								echo $navigator;
								
								?>
								</td>
							</tr>
							</table>
						</td>
						<td width="50%" align="right">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8'>
							<tr>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8'>
									<tr>
										<td width="10"><a href="main.php?act=catlg&code=01&pid=<?=intval($_GET['pid'])?>"><img src="images/new_cat.png" border="0"></a></td>
										<td width="120"><a href="main.php?act=catlg&code=01&pid=<?=intval($_GET['pid'])?>">Th&#234;m Nh&#243;m m&#7899;i</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8'>
									<tr>
										<td width="10"><a href="main.php?act=catlg&code=21&pid=<?=intval($_GET['pid'])?>"><img src="images/new_news.png" border="0"></a></td>
										<td width="100"><a href="main.php?act=catlg&code=21&pid=<?=intval($_GET['pid'])?>">Th&#234;m m&#7899;i</a></td>
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
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#D8D8D8' width='98%'>
							<tr>
								<td>					

<?php
require ("../lib/upload.php");
require ("../lib/imaging.php");
require ("skin/skin_catlg.php");

function showlist()
{
	global $DB,$info,$catlgstring2,$CONFIG;
	$info['root']="<a href='main.php?act=catlg&pid=0'>Root</a> > ";
	if ($_GET['pid'])
	{
		$dk=intval($_GET['pid']);
		$info['root'].=$catlgstring2;
	}
	else
	{
		$dk=0;
	}
	
	
	$sql="Select * from catlg where parentid=$dk order by thu_tu asc,id_catlg desc";
	$a=$DB->query($sql);
	$info=array();
	if (mysql_num_rows($a))
	{
		show_catlg_list_h();
		while ($b=mysql_fetch_array($a))
		{
			$info['id_catlg']=$b['id_catlg'];
			$info['name']="<a href='main.php?act=catlg&pid=".$info['id_catlg']."'>".$b['name']."</a>";
			$info['active']=$b['active'];
			if ($info['active'])
				$info['status']="Cho đăng";
			else
				$info['status']="Không đăng";		
			$info['thu_tu']=$b['thu_tu'];
			show_catlg_cell($info);
		}
		show_catlg_list_f();
	}
	//logo
	show_logo_list_h();
	$dklogo="";
	$dklogo="where id_catlg=".intval($_GET['pid'])." ";			
	
	$sql="Select * from logo $dklogo order by thu_tu asc,id_logo desc";
	$a=$DB->query($sql);
	$info=array();
	while ($b=mysql_fetch_array($a))
	{
		$info['id_logo']=$b['id_logo'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Cho đăng";
		else
			$info['status']="Không đăng";
		
		//$info['name']=$b['name'];
		$info['name']="";
		if ($b['image'])
		{
			if (is_remote($b['image']))
			{
				//remote file
				$image_info = @getimagesize($b['image']);
				if (get_file_extension($b['image'])=='swf' || get_file_extension($b['image'])=='SWF')
				{
					$info['name'].='
					  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" '.$image_info[3].' />
					  <param name="movie" value="'.$b['image'].'">
					  <param name="quality" value="high">
					  <param name="play" value="true">
					  <param name="scale" value="false">
					  <embed src="'.$b['image'].'" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" '.$image_info[3].'></embed></object>
					<br>';
				}
				else
				{
					$info['name'].="<img src='".$b['image']."' border='0' ".$image_info[3]."><br>";
				}
			}
			else
			{
				//local file
				$image_info = @getimagesize('../'.$CONFIG['upload_image_path'].$b['image']);
				if (get_file_extension($b['image'])=='swf' || get_file_extension($b['image'])=='SWF')
				{
					$info['name'].='
					  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" '.$image_info[3].' />
					  <param name="movie" value="../'.$CONFIG['upload_image_path'].$b['image'].'">
					  <param name="quality" value="high">
					  <param name="play" value="true">
					  <param name="scale" value="false">
					  <embed src="../'.$CONFIG['upload_image_path'].$b['image'].'" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" '.$image_info[3].'></embed></object>
					<br>';
				}
				else
				{
					$info['name'].="<img src='../".$CONFIG['upload_image_path'].$b['image']."' border='0' style='max-width:500px;'><br>";
				}
			}
		}
		//$info['name'].="<img src='../".$CONFIG['upload_image_path'].$b['image']."' border='0'><br>";
		$info['name'].="<b>".$b['name']."</b><br>";
		$info['name'].="Link: <a href='".$b['link']."' target='_blank'>".$b['link']."</a><br>";
		show_logo_cell($info);
	}
	show_logo_list_f();	
}
function showportal()
{
	global $tree,$info;
	$info['parentid']='';
	//$ct=new catlg_tree;
	//$ct->get_catlg_tree();
	$info['parentid'] .= '<select name="parentid" style="WIDTH: 220px" >';
	$info['parentid'] .= '<option value="0">Root</option>';
	
	foreach($tree as $k => $v) {
		foreach($v as $i => $j) {
			$selectstr='';
			if ($_GET['pid']==$k)
				$selectstr=" selected ";
			$info['parentid'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
		}
	}
	
	$info['parentid'] .= '</select>';
	show_catlg_post_form();
	showlist();
}	
if (($_GET['code']=='00') or !$_GET['code'])
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
					'name'=>$in_name,
				);
		$a['thu_tu']=compile_post('thu_tu');
		
		$a['active']=compile_post('active');
		$a['parentid']=compile_post('parentid');
		$b=$DB->compile_db_insert_string($a);
		$sql="INSERT INTO catlg (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
		$DB->query($sql);
		show_message("Th&#234;m m&#7899;i Nh&#243;m th&#224;nh c&#244;ng !");
	}
	else
	{
		show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
	}
	showlist();
}
if ($_GET['code']=='03')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from catlg where id_catlg=".$id;
		$a=$DB->query($sql);
		if ($b=mysql_fetch_array($a))
		{
			$info['id_catlg']=$id;
			$info['name']=$b['name'];
			$info['thu_tu']=$b['thu_tu'];
			$info['parentid1']=$b['parentid'];
			if ($b['active'])
				$info['active']="checked";
			
			//$ct=new catlg_tree;
			//$ct->get_catlg_tree();
			$info['parentid'] .= '<select name="parentid" style="WIDTH: 220px" >';
			$info['parentid'] .= '<option value="0">Root</option>';
			
			foreach($tree as $k => $v) {
				foreach($v as $i => $j) {
					$selectstr='';
					if ($info['parentid1']==$k)
						$selectstr=" selected ";
					$info['parentid'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
				}
			}
			
			$info['parentid'] .= '</select>';
			
				
			show_catlg_update_form($info);
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
		if ($in_name)
		{
			$a=array(
						'name'=>$in_name,
					);
			$a['parentid']=compile_post('parentid');
			
			$a['active']=compile_post('active');
			$a['thu_tu']=compile_post('thu_tu');
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE catlg SET ".$b." WHERE id_catlg=".$id;
			$DB->query($sql);
			show_message("S&#7917;a th&#244;ng tin Nh&#243;m th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
		}
		showlist();
	}
}
if ($_GET['code']=='05')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="select count(id_catlg) as dem from catlg where parentid=".$id;
		$x=$DB->query($sql);
		if ($y=mysql_fetch_array($x))
		{
			if ($y['dem'])
			{
				show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$y['dem']."</b> Nh&#243;m con tr&#7921;c thu&#7897;c Nh&#243;m n&#224;y.
				<br>B&#7841;n c&#7847;n x&#243;a c&#225;c Nh&#243;m con tr&#432;&#7899;c !");
			}
			else
			{
				$sql="select count(id_logo) as dem from logo where id_catlg=".$id;
				$a=$DB->query($sql);
				if($b=mysql_fetch_array($a))
				{
					if ($b['dem'])
					{
						show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$b['dem']."</b> Logo - Banner tr&#7921;c thu&#7897;c Nh&#243;m n&#224;y.
						<br>B&#7841;n c&#243; mu&#7889;n x&#243;a Nh&#243;m n&#224;y v&#224; t&#7845;t c&#7843; Logo - Banner tr&#7921;c thu&#7897;c Nh&#243;m ?
						<br><a href='main.php?act=catlg&code=06&id=".$id."&pid=".intval($_GET['pid'])."'>C&#243;</a>&nbsp;&nbsp;<a href='main.php?act=catlg&code=00&pid=".intval($_GET['pid'])."'>Kh&#244;ng</a>
						
						 ");
					}
					else
					{
						$sql="Delete from catlg where id_catlg=".$id;
						$DB->query($sql);
						show_message("&#272;&#227; x&#243;a Nh&#243;m !");
					}
				}
			}
		}
		showlist();
	}

}
if ($_GET['code']=='06')
{
	$id=intval($_GET['id']);
	if ($id)
	{
				$sql="select * from logo where id_catlg=".$id;
				$x=$DB->query($sql);
				while ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
					}					
				}
				$sql="delete from logo where id_catlg=".$id;
				$DB->query($sql);					


		$sql="Delete from catlg where id_catlg=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a Nh&#243;m !");
		showlist();
	}

}

if ($_GET['code']=='08')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Không đăng')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE catlg SET ".$b." WHERE id_catlg=".$id;
		$DB->query($sql);
		show_message("Thay đổi trạng thái thành công !");
	}
	if ($opt=='Cho đăng')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE catlg SET ".$b." WHERE id_catlg=".$id;
		$DB->query($sql);
		show_message("Thay đổi trạng thái thành công !");
	}
	showlist();		
}

if ($_GET['code']=='09')
{
	$sql="Select * from catlg where parentid=".intval($_GET['pid'])." order by thu_tu asc,id_catlg desc";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	while ($d=mysql_fetch_array($c))
	{
		$thu_tu=compile_post('thu_tu_'.$d['id_catlg']);
		if ($thu_tu!=$d['thu_tu'])
		{
			$a['thu_tu']=$thu_tu;
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE catlg SET ".$b." WHERE id_catlg=".$d['id_catlg'];
			$DB->query($sql);
		}
	}
	show_message("Thay đổi thứ tự hiển thị thành công!");
	showlist();
}

if ($_GET['code']=='21')
{
	//$ct=new catlg_tree;
	//$ct->get_catlg_tree();
	$info['options_catlg'] .= '<select name="id_catlg" style="WIDTH: 220px" >';
	$info['options_catlg'] .= '<option value="0">Root</option>';
	$ppid=intval($_GET['pid']);
	foreach($tree as $k => $v) {
		foreach($v as $i => $j) {
			$selectstr='';
			if ($ppid==$k)
				$selectstr=" selected ";
			$info['options_catlg'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
		}
	}
	
	$info['options_catlg'] .= '</select>';
	show_logo_post_form($info);
}
if ($_GET['code']=='22')
{
	$msg="";
		$in_name=compile_post('name');
		$a=array(
				'name'=>$in_name
				);
		
		//
		
		if ($_FILES['image']['size'])
		{
			$in_image=get_new_file_name($_FILES['image']['name'],"logo_");
			
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,swf');
			if ($file_upload->upload_file('image',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['image']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		else
		{
			//Kiem tra remote url
			$img_url=compile_post('img_url');
			$img_url=trim($img_url);
			if ($img_url!="")
			{
				if (remote_file_exists($img_url))
				{
					//that remote file 's valid
					$a['image']=$img_url;
				}
				else
				{
					$msg.="Kh&#244;ng truy nh&#7853;p &#273;&#432;&#7907;c file theo URL &#273;&#227; nh&#7853;p !<br>";
				}
			}
		}
		
		$a['link']=compile_post('link');
		$a['link_video']=compile_post('link_video');
		$a['gioi_thieu']=compile_post('gioi_thieu');
		$a['id_catlg']=compile_post('id_catlg');
		$a['active']=compile_post('active');
		$a['thu_tu']=compile_post('thu_tu');
		$a['ngay_dang']=time()+$CONGIF['time_offset'];
		if (!$msg)
		{	
			$b=$DB->compile_db_insert_string($a);
			$sql="INSERT INTO logo (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
			$DB->query($sql);
			
			show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message($msg);
		}
		showlist();
}
if ($_GET['code']=='23')
{
	$msg="";
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from logo where id_logo=".$id;
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_logo']=$id;
			$info['name']=$b['name'];
			$info['image']="";
			
			if ($b['image'])
			{
				if (is_remote($b['image']))
				{
					//remote file
					$image_info = @getimagesize($b['image']);
					if (get_file_extension($b['image'])=='swf' || get_file_extension($b['image'])=='SWF')
					{
						$info['image'].='
						  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" '.$image_info[3].' />
						  <param name="movie" value="'.$b['image'].'">
						  <param name="quality" value="high">
						  <param name="play" value="true">
						  <param name="scale" value="false">
						  <embed src="'.$b['image'].'" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" '.$image_info[3].'></embed></object>
						<br>';
					}
					else
					{
						$info['image'].="<img src='".$b['image']."' border='0' ".$image_info[3]."><br>";
					}
				}
				else
				{
					//local file
					$image_info = @getimagesize('../'.$CONFIG['upload_image_path'].$b['image']);
					if (get_file_extension($b['image'])=='swf' || get_file_extension($b['image'])=='SWF')
					{
						$info['image'].='
						  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" '.$image_info[3].' />
						  <param name="movie" value="../'.$CONFIG['upload_image_path'].$b['image'].'">
						  <param name="quality" value="high">
						  <param name="play" value="true">
						  <param name="scale" value="false">
						  <embed src="../'.$CONFIG['upload_image_path'].$b['image'].'" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" '.$image_info[3].'></embed></object>
						<br>';
					}
					else
					{
						$info['image'].="<img src='../".$CONFIG['upload_image_path'].$b['image']."' border='0' ".$image_info[3]."><br>";
					}
				}
			}

			$info['link_video']=$b['link_video'];
			$info['gioi_thieu']=$b['gioi_thieu'];
			$info['link']=$b['link'];
			$info['thu_tu']=$b['thu_tu'];
			$info['id_catlg']=$b['id_catlg'];
			if ($b['active']) $info['active']="checked";
			
			//$ct=new catlg_tree;
			//$ct->get_catlg_tree();
			$info['options_catlg'] .= '<select name="id_catlg" style="WIDTH: 220px" >';
			$info['options_catlg'] .= '<option value="0">Root</option>';
			
			foreach($tree as $k => $v) {
				foreach($v as $i => $j) {
					$selectstr='';
					if ($info['id_catlg']==$k)
						$selectstr=" selected ";
					$info['options_catlg'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
				}
			}
			
			$info['options_catlg'] .= '</select>';
			if ($b['active']) $info['active']="checked";
			show_logo_update_form($info);
		
		}
	
	}

}
if ($_GET['code']=='24')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$msg="";
		$in_name=compile_post('name');
		$a=array(
					'name'=>$in_name
				);
		
		if ($_FILES['image']['size'])
		{
			$in_image=get_new_file_name($_FILES['image']['name'],"logo_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,swf');
			if ($file_upload->upload_file('image',2,$in_image))
			{
				//Da upload thanh cong
				//delete old files
				$sql="select * from logo where id_logo=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
					}					
				}
				
				$a['image']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		else
		{
			//Kiem tra remote url
			$img_url=compile_post('img_url');
			$img_url=trim($img_url);
			if ($img_url!="")
			{
				if (remote_file_exists($img_url))
				{
						//that remote file 's valid
						//delete old thumb files
						$sql="select * from logo where id_logo=".$id;
						$x=$DB->query($sql);
						if ($y=mysql_fetch_array($x))
						{
							$lastfile=$y['image'];
							if ($lastfile)
							{
								if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
								{
									unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
								}							
							}					
						}
						
						$a['image']=$img_url;
						
				}
				else
				{
					$msg.="Kh&#244;ng truy nh&#7853;p &#273;&#432;&#7907;c file theo URL &#273;&#227; nh&#7853;p !<br>";
				}
			}
		}
				
		$a['link_video']=compile_post('link_video');	
		$a['gioi_thieu']=compile_post('gioi_thieu');	
		$a['link']=compile_post('link');
		$a['id_catlg']=compile_post('id_catlg');
		$a['thu_tu']=compile_post('thu_tu');
		
		$a['active']=compile_post('active');
		if (!$msg)		
		{
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE logo SET ".$b." WHERE id_logo=".$id;
			$DB->query($sql);
			show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message($msg);
		}
		showlist();
	}

}
if ($_GET['code']=='25')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		//delete old files
				$sql="select * from logo where id_logo=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
					}					
				}
		$sql="Delete from logo where id_logo=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		showlist();
	}

}
if ($_GET['code']=='28')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Không đăng')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE logo SET ".$b." WHERE id_logo=".$id;
		$DB->query($sql);
		show_message("Thay đổi trạng thái thành công !");
	}
	if ($opt=='Cho đăng')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE logo SET ".$b." WHERE id_logo=".$id;
		$DB->query($sql);
		show_message("Thay đổi trạng thái thành công !");
	}
	showlist();		
}

if ($_GET['code']=='29')
{
	$sql="Select * from logo where id_catlg=".intval($_GET['pid'])." order by thu_tu asc,id_logo desc";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	while ($d=mysql_fetch_array($c))
	{
		$thu_tu=compile_post('thu_tu_'.$d['id_logo']);
		if ($thu_tu!=$d['thu_tu'])
		{
			$a['thu_tu']=$thu_tu;
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE logo SET ".$b." WHERE id_logo=".$d['id_logo'];
			$DB->query($sql);
		}
	}
	show_message("Thay đổi thứ tự hiển thị thành công !");
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