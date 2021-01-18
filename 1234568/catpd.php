<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );

?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Qu&#7843;n l&#253; th&#244;ng tin s&#7843;n ph&#7849;m</font></td>
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
								<?php
								require ("../lib/catpd_tree.php");
								$navigator="<a href='main.php?act=catpd&pid=0'>Root</a> > ";
								$dk=intval($_GET['pid']);
								$ct=new catpd_tree($dk);
								$ct->get_catpd_tree();	
								$ct->get_catpd_string_admin($dk);
								$navigator.=$catpdstring2;								
								echo $navigator;
								
								?>
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
										<td width="10"><a href="main.php?act=catpd&code=30"><img src="images/search.png" border="0"></a></td>
										<td width="80"><a href="main.php?act=catpd&code=30">T&#236;m ki&#7871;m</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>							
							
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=catpd&code=01&pid=<?=intval($_GET['pid'])?>"><img src="images/new_cat.png" border="0"></a></td>
										<td width="140"><a href="main.php?act=catpd&code=01&pid=<?=intval($_GET['pid'])?>">Th&#234;m Ch&#7911;ng lo&#7841;i m&#7899;i</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=catpd&code=21&pid=<?=intval($_GET['pid'])?>"><img src="images/new_news.png" border="0"></a></td>
										<td width="140"><a href="main.php?act=catpd&code=21&pid=<?=intval($_GET['pid'])?>">Th&#234;m s&#7843;n ph&#7849;m m&#7899;i</a></td>
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
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='98%'>
							<tr>
								<td>					

<?php
require ("../lib/upload.php");
require ("../lib/imaging.php");
require ("skin/skin_catpd.php");



function showlist()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	$info['root']="<a href='main.php?act=catpd&pid=0'>Root</a> > ";
	if ($_GET['pid'])
	{
		$dk=intval($_GET['pid']);
		$info['root'].=$catpdstring2;
	}
	else
	{
		$dk=0;
	}
	
	
	$sql="Select * from catpd where parentid=$dk order by thu_tu asc,id_catpd desc";
	$a=$DB->query($sql);
	$info=array();
	if (mysql_num_rows($a))
	{
		show_catpd_list_h();
		while ($b=mysql_fetch_array($a))
		{
			$info['id_catpd']=$b['id_catpd'];
			$info['name']="<a href='main.php?act=catpd&pid=".$info['id_catpd']."'>".$b['name']."</a>";
			$info['active']=$b['active'];
			if ($info['active'])
				$info['status']="Cho đăng";
			else
				$info['status']="Không đăng";		
			$info['thu_tu']=$b['thu_tu'];
			show_catpd_cell($info);
		}
		show_catpd_list_f();
	}
	//product
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$maxdp=intval($_GET['maxdp']);
	$pid=intval($_GET['pid']);
	if (!$maxdp)
	{
		$maxdp=20;
	}
	$dkproduct="";
	$dkproduct="where id_catpd=".$pid." ";
	if ($txtsearch)
	{
		$dkproduct.=" and product.name like '%".$txtsearch."%'";
	}			
	//Phan trang
	$sql="select count(*) as dem from product $dkproduct order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
		$so_trang=ceil($dem/$maxdp);
		if ($so_trang>1)
		{
			$str="Trang: ";
			for ($i=1;$i<=$so_trang;$i++)
			{
				if ($_GET['p']==$i or (!$_GET['p'] and ($i==1))) 
				{
					$str=$str."&nbsp;<font color='#ff0000'>[<b>".$i."</b>]</font>";
				}
				else
				{
					if ($txtsearch)
						$pagesearch="&txtsearch=".$txtsearch;
					$str.="&nbsp;<a href='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."&maxdp=".$maxdp.$pagesearch."&p=".$i."'>".$i."</a>";
				}
			}
		}
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	$info['dem']=$dem;
	$info['navpage']=$str;
	$str="";
	//het phan phan trang 
	//Lay hop select cac muc
	$info['showcatpds'] .= '<select name="pid" style="WIDTH: 220px" >';
	$info['showcatpds'] .= '<option value="0">Root</option>';
	
	foreach($tree as $k => $v) {
		foreach($v as $i => $j) {
			$selectstr='';
			if (intval($_GET['pid'])==$k)
				$selectstr=" selected ";
			$info['showcatpds'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
		}
	}
	
	$info['showcatpds'] .= '</select>';
	
	//Hien thi danh sach
	
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dkproduct order by thu_tu asc,id_product desc $dklimit";
	$a=$DB->query($sql);
	$i=0;
	$info['dem_i']=mysql_num_rows($a);
	show_product_list_h($info);
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['i']=$i;
		$info['id_product']=$b['id_product'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Cho đăng";
		else
			$info['status']="Không đăng";
		
		$info['name']=$b['name'];
		$info['user_name']=$b['user_name'];
		$info['ngay_dang']=date($CONFIG['date_format'].' '.$CONFIG['time_format'],$b['ngay_dang']);
		show_product_cell($info);
	}
	//$info['dem_i']=$i;
	show_product_list_f($info);	
}
function showportal()
{
	global $tree,$info;
	$info['parentid']='';
	//$ct=new catpd_tree;
	//$ct->get_catpd_tree();
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
	show_catpd_post_form();
	showlist();
}	
//FUNCTION FOR SEARCH
function init_search_form()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$searchgt=$_GET['searchgt'];
	$idcatpd=intval($_GET['idcatpd']);
	$iduser=intval($_GET['iduser']);
	$fd=intval($_GET['fd']);
	$fm=intval($_GET['fm']);
	$fy=intval($_GET['fy']);
	$td=intval($_GET['td']);
	$tm=intval($_GET['tm']);
	$ty=intval($_GET['ty']);	
	if (!$td)
	{
		$td=date("j",time()+$CONFIG['time_offset']);
	}
	if (!$tm)
	{
		$tm=date("n",time()+$CONFIG['time_offset']);
	}
	if (!$ty)
	{
		$ty=date("Y",time()+$CONFIG['time_offset']);
	}	
		
	
	$info['txtsearch']=$txtsearch;
	if ($searchgt)
	{
		$info['check_searchgt']="checked";
	}
	//Lay hop select cac muc
	
	$info['showcatpds'] .= '<select name="idcatpd" style="WIDTH: 220px" >';
	$info['showcatpds'] .= '<option value="-1">T&#7845;t c&#7843; c&#225;c ch&#7911;ng lo&#7841;i</option>';
	$info['showcatpds'] .= '<option value="0">Root</option>';
	foreach($tree as $k => $v) {
		foreach($v as $i => $j) {
			$selectstr='';
			if ($idcatpd==$k)
				$selectstr=" selected ";
			$info['showcatpds'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
		}
	}
	
	
	$info['showcatpds'] .= '</select>';
	//Users
	$info['showusers']='<select name="iduser" style="WIDTH: 220px" >';
	$info['showusers'] .= '<option value="-1">T&#7845;t c&#7843; ng&#432;&#7901;i &#273;&#259;ng</option>';
	$sql="select * from users order by id_users asc";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$info['showusers'].="<option value='".$b['id_users']."'";
		if ($iduser==$b['id_users'])
			$info['showusers'].=" selected";
		$info['showusers'].=">".$b['name']."</option>";
	}
	$info['showusers'].="</select>";
	
	
	//From
	$info['showfrom']="";
	$info['showfrom'].="Ng&#224;y: <select name='fd'>";
	for ($i=1;$i<=31;$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fd)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";
	$info['showfrom'].="&nbsp;Th&#225;ng: <select name='fm'>";
	for ($i=1;$i<=12;$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fm)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";
	$info['showfrom'].="&nbsp;N&#259;m: <select name='fy'>";
	for ($i=1990;$i<=date("Y",time()+$CONFIG['time_offset']);$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fy)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";	
	//To
	$info['showto']="";
	$info['showto'].="Ng&#224;y: <select name='td'>";
	for ($i=1;$i<=31;$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$td)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showto'].="</select>";
	$info['showto'].="&nbsp;Th&#225;ng: <select name='tm'>";
	for ($i=1;$i<=12;$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$tm)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showto'].="</select>";
	$info['showto'].="&nbsp;N&#259;m: <select name='ty'>";
	for ($i=1990;$i<=date("Y",time()+$CONFIG['time_offset']);$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$ty)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";	
	//show form
	showsearchform($info);
	
}
function process_search()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$searchgt=$_GET['searchgt'];
	$idcatpd=intval($_GET['idcatpd']);
	$iduser=intval($_GET['iduser']);
	$maxdp=intval($_GET['maxdp']);
	$fd=intval($_GET['fd']);
	$fm=intval($_GET['fm']);
	$fy=intval($_GET['fy']);
	$td=intval($_GET['td']);
	$tm=intval($_GET['tm']);
	$ty=intval($_GET['ty']);	
	$timefrom=mktime(0,0,0,$fm,$fd,$fy);
	$timeto=mktime(24,60,60,$tm,$td,$ty);
	
	$dksearch="";
	
	if ($txtsearch)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
		$dksearch.=" (product.name like '%".$txtsearch."%'";
		if ($searchgt)
		{
			$dksearch.=" or gioi_thieu like '%".$txtsearch."%' or noi_dung like '%".$txtsearch."%'"; 
		}
		$dksearch.=")";
	}
	
	if ($idcatpd>0)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
		$dksearch.=" id_catpd=".$idcatpd;
	}
	if ($iduser>0)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
	
		$dksearch.=" id_user=".$iduser;
	}
	if ($timeto>=$timefrom)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
		$dksearch.=" (ngay_dang>=".$timefrom." and ngay_dang<=".$timeto.")";
	}
		
	
	//Phan trang
	if (!$maxdp)
	{
		$maxdp=10;
	}
	
	$sql="select count(*) as dem from product $dksearch order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
		$so_trang=ceil($dem/$maxdp);
		if ($so_trang>1)
		{
			$str="Trang: ";
			for ($i=1;$i<=$so_trang;$i++)
			{
				if ($_GET['p']==$i or (!$_GET['p'] and ($i==1))) 
				{
					$str=$str."&nbsp;<font color='#ff0000'>[<b>".$i."</b>]</font>";
				}
				else
				{
					if ($txtsearch)
						$pagesearch="&txtsearch=".$txtsearch;
					$str.="&nbsp;<a href='main.php?act=catpd&code=31&txtsearch=".$txtsearch."&searchgt=".$searchgt."&idcatpd=".$idcatpd."&iduser=".$iduser."&fd=".$fd."&fm=".$fm."&fy=".$fy."&td=".$td."&tm=".$tm."&ty=".$ty."&maxdp=".$maxdp.$pagesearch."&p=".$i."'>".$i."</a>";
				}
			}
		}
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	$info['dem']=$dem;
	$info['navpage']=$str;
	$str="";
	//het phan phan trang 
	//Hien thi danh sach
	
	init_search_form();
	
	search_show_product_list_h($info);
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dksearch order by id_product desc $dklimit";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$info['id_product']=$b['id_product'];
		$info['id_catpd']=$b['id_catpd'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Cho đăng";
		else
			$info['status']="Không đăng";
		
		$info['name']=$b['name'];
		$info['user_name']=$b['user_name'];
		$info['ngay_dang']=date($CONFIG['date_format'].' '.$CONFIG['time_format'],$b['ngay_dang']);
		search_show_product_cell($info);
	}

	search_show_product_list_f($info);	
	
}
//END FUNCTION FOR SEARCH => 03
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
				
					
		$info['parentid'] .= '<select name="parentid" style="WIDTH: 220px" >';
		$info['parentid'] .= '<option value="0">Root</option>';
			
			foreach($tree as $k => $v) {
				foreach($v as $i => $j) {
					$info['parentid'] .= '<option value="' . $k . '">' . $j . '</option>';
				}
			}
			
			$info['parentid'] .= '</select>';
		$a['thu_tu']=compile_post('thu_tu');
		$a['active']=compile_post('active');
		$a['parentid']=compile_post('parentid');
		
		$b=$DB->compile_db_insert_string($a);
		$sql="INSERT INTO catpd (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
		$DB->query($sql);
		show_message("Th&#234;m m&#7899;i Ch&#7911;ng lo&#7841;i th&#224;nh c&#244;ng !");
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
		$sql="Select * from catpd where id_catpd=".$id;
		$a=$DB->query($sql);
		if ($b=mysql_fetch_array($a))
		{
			$info['id_catpd']=$id;
			$info['name']=$b['name'];
			if($b['active'])
			{
			$info['active']="checked";	
			}		
			
			$info['thu_tu']=$b['thu_tu'];
			$info['parentid1']=$b['parentid'];
			//$ct=new catpd_tree;
			//$ct->get_catpd_tree();
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
			
				
			show_catpd_update_form($info);
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
			$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
			$DB->query($sql);
			show_message("S&#7917;a th&#244;ng tin Ch&#7911;ng lo&#7841;i th&#224;nh c&#244;ng !");
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
		$sql="select count(id_catpd) as dem from catpd where parentid=".$id;
		$x=$DB->query($sql);
		if ($y=mysql_fetch_array($x))
		{
			if ($y['dem'])
			{
				show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$y['dem']."</b> Ch&#7911;ng lo&#7841;i con tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i n&#224;y.
				<br>B&#7841;n c&#7847;n x&#243;a c&#225;c Ch&#7911;ng lo&#7841;i con tr&#432;&#7899;c !");
			}
			else
			{
				$sql="select count(id_product) as dem from product where id_catpd=".$id;
				$a=$DB->query($sql);
				if($b=mysql_fetch_array($a))
				{
					if ($b['dem'])
					{
						show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$b['dem']."</b> s&#7843;n ph&#7849;m tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i n&#224;y.
						<br>B&#7841;n c&#243; mu&#7889;n x&#243;a Ch&#7911;ng lo&#7841;i n&#224;y v&#224; t&#7845;t c&#7843; s&#7843;n ph&#7849;m tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i ?
						<br><a href='main.php?act=catpd&code=06&id=".$id."&pid=".intval($_GET['pid'])."'>C&#243;</a>&nbsp;&nbsp;<a href='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'>Kh&#244;ng</a>
						
						 ");
					}
					else
					{
						$sql="Delete from catpd where id_catpd=".$id;
						$DB->query($sql);
						show_message("&#272;&#227; x&#243;a Ch&#7911;ng lo&#7841;i !");
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
				$sql="select * from product where id_catpd=".$id;
				$x=$DB->query($sql);
				while ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
				$sql="delete from product where id_catpd=".$id;
				$DB->query($sql);					
				

		$sql="Delete from catpd where id_catpd=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a Ch&#7911;ng lo&#7841;i !");
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
		$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
		$DB->query($sql);
		show_message("Nhóm sản phẩm đã được hiển thị!");
	}
	if ($opt=='Cho đăng')
	{
		$a['active']='Cho đăng';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
		$DB->query($sql);
		show_message("Nhóm sản phẩm đã được cho ẩn đi !");
	}
	showlist();		
}

if ($_GET['code']=='09')
{
	$sql="Select * from catpd where parentid=".intval($_GET['pid'])." order by thu_tu asc,id_catpd desc";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	while ($d=mysql_fetch_array($c))
	{
		$thu_tu=compile_post('thu_tu_'.$d['id_catpd']);
		if ($thu_tu!=$d['thu_tu'])
		{
			$a['thu_tu']=$thu_tu;
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$d['id_catpd'];
			$DB->query($sql);
		}
	}
	show_message("Thay đổi thứ tự hiển thị thành công !");
	showlist();
}

if ($_GET['code']=='21')
{
	$info['options_catpd'] .= '<select name="id_catpd_all" style="WIDTH: 220px" >';
	$info['options_catpd'] .= '<option value="0">Root</option>';
	$sql = $DB->query("select name,id_catpd from catpd where active='1' and parentid=0 order by thu_tu asc, id_catpd desc");
	while($b = $DB->fetch_row($sql))
	{
		$info['options_catpd'] .= '<option value="' . $b['id_catpd'] . '">-- ' . $b['name'] . '</option>';
		
		$sql2 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$b['id_catpd']." order by thu_tu asc, id_catpd desc");
		while($b2 = $DB->fetch_row($sql2))
		{
			$info['options_catpd'] .= '<option value="' . $b['id_catpd'] . '_'.$b2['id_catpd'].'">-- -- ' . $b2['name'] . '</option>';
			
				$sql3 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$b2['id_catpd']." order by thu_tu asc, id_catpd desc");
				while($b3 = $DB->fetch_row($sql3))
				{	
					$info['options_catpd'] .= '<option value="' . $b['id_catpd'] . '_'.$b2['id_catpd'].'_'.$b3['id_catpd'].'">-- -- -- ' . $b3['name'] . '</option>';
				}
		}

	}
	
	$info['options_catpd'] .= '</select>';
	show_product_post_form($info);
}
if ($_GET['code']=='22')
{
	$msg="";
	$in_name=compile_post('name');
	if ($in_name)
	{
		$a=array(
				'name'=>$in_name
				);
		
		if ($_FILES['image']['size'])
		{
			$in_image=get_new_file_name($_FILES['image']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['image']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
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
					if (check_remote_thumb($img_url)) 
					{
						//that remote file 's valid
						$a['image']=$img_url;
						if ($thumbnail=create_thumb_url($img_url))
						{
							$a['small_image']=$thumbnail['thumb'];
							$a['normal_image']=$thumbnail['normal'];
						}
						else
						{
							$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! H&#227;y xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
						}
						
					}
					else
					{
						$msg.="&#272;&#7883;nh d&#7841;ng file kh&#244;ng &#273;&#250;ng!<br>";
					}
				}
				else
				{
					$msg.="Kh&#244;ng truy nh&#7853;p &#273;&#432;&#7907;c file theo URL &#273;&#227; nh&#7853;p !<br>";
				}
			}
		}
		if ($_FILES['image1']['size'])
		{
			$in_image=get_new_file_name($_FILES['image1']['name'],"product1_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image1',2,$in_image))
			{
				$a['image1']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		if ($_FILES['image2']['size'])
		{
			$in_image=get_new_file_name($_FILES['image2']['name'],"product2_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image2',2,$in_image))
			{
				$a['image2']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		if ($_FILES['image3']['size'])
		{
			$in_image=get_new_file_name($_FILES['image3']['name'],"product3_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image3',2,$in_image))
			{
				$a['image3']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		if ($_FILES['image4']['size'])
		{
			$in_image=get_new_file_name($_FILES['image3']['name'],"product4_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image4',2,$in_image))
			{
				$a['image4']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		
		$id_catpd_all = explode("_",compile_post('id_catpd_all'));
		$a['idroot']=$id_catpd_all[0];
		$a['parentid']=$id_catpd_all[1];
		if($id_catpd_all[2])
		{
			$a['id_catpd']=$id_catpd_all[2];
		}
		else
		{
			$a['id_catpd'] = $a['parentid'];
		}	
		
		//echo $id_catpd_all[0]."<br>".$id_catpd_all[1]."<br>".$id_catpd_all[2]; exit();
		
		$a['noi_dung']=$_POST['noi_dung'];
		
		$a['active']=compile_post('active');
		$a['hot']=compile_post('hot');
		$a['thu_tu']=compile_post('thu_tu');
		$a['ngay_dang']=time()+$CONGIF['time_offset'];
		$a['id_user']=$my['id'];
		if (!$msg)
		{	
			$b=$DB->compile_db_insert_string($a);
			$sql="INSERT INTO product (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
			$DB->query($sql);
			
			show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message($msg);
		}
	}
	else
	{
		show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
	}
	showlist();
}
if ($_GET['code']=='23')
{
	$msg="";
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from product where id_product=".$id;
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_product']=$id;
			$info['name']=$b['name'];
			$info['image']=$b['image'];
			$info['image1']=$b['image1'];
			$info['image2']=$b['image2'];
			$info['image3']=$b['image3'];
			$info['image4']=$b['image4'];

			if ($info['image'])
			{
				if (is_remote($info['image']))
				{
					$info['image']="<img src='".$info['image']."'><br><input type='checkbox' name='xoa_anh' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['image']="<img src='../".$CONFIG['upload_image_path'].$info['image']."' style='max-width:500px;'><br><input type='checkbox' name='xoa_anh' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}
			if ($info['image1'])
			{
				$info['image1']="<img src='../".$CONFIG['upload_image_path'].$info['image1']."' style='max-width:500px; max-height:500px;'><br><input type='checkbox' name='xoa_anh1' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
			}
			if ($info['image2'])
			{
				$info['image2']="<img src='../".$CONFIG['upload_image_path'].$info['image2']."' style='max-width:500px; max-height:500px;'><br><input type='checkbox' name='xoa_anh2' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
			}
			if ($info['image3'])
			{
				$info['image3']="<img src='../".$CONFIG['upload_image_path'].$info['image3']."' style='max-width:500px; max-height:500px;'><br><input type='checkbox' name='xoa_anh3' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
			}
			if ($info['image4'])
			{
				$info['image4']="<img src='../".$CONFIG['upload_image_path'].$info['image4']."' style='max-width:500px; max-height:500px;'><br><input type='checkbox' name='xoa_anh4' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
			}

			//$info['price']=$b['price'];
			//$info['gioi_thieu']=str_replace("<br>","\n",$b['gioi_thieu']);
			$info['noi_dung']=$b['noi_dung'];
			$info['thu_tu']=$b['thu_tu'];
			$info['active']=$b['active'];

			$info['options_catpd'] .= '<select name="id_catpd_all" style="WIDTH: 220px" >';
			$info['options_catpd'] .= '<option value="0">Root</option>';

			$sql22 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=0 order by thu_tu asc, id_catpd desc");
			while($bbb = $DB->fetch_row($sql22))
			{
				$info['options_catpd'] .= '<option value="' . $bbb['id_catpd'] . '">-- ' . $bbb['name'] . '</option>';
				$sql2 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$bbb['id_catpd']." order by thu_tu asc, id_catpd desc");
				while($b2 = $DB->fetch_row($sql2))
				{
					if($b['id_catpd']==$b2['id_catpd'])
					{
						$selectstr='selected';
					}
					else
					{
						$selectstr='';
					}
					$info['options_catpd'] .= '<option value="' . $bbb['id_catpd'] . '_'.$b2['id_catpd'].'" '.$selectstr.'>-- -- ' . $b2['name'] . '</option>';
					
					$sql3 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$b2['id_catpd']." order by thu_tu asc, id_catpd desc");
					while($b3 = $DB->fetch_row($sql3))
					{	
						if($b['id_catpd']==$b3['id_catpd'])
						{
							$selectstr2='selected';
						}
						else
						{
							$selectstr2='';
						}
						$info['options_catpd'] .= '<option value="' . $bbb['id_catpd'] . '_'.$b2['id_catpd'].'_'.$b3['id_catpd'].'" '.$selectstr2.'>-- -- -- ' . $b3['name'] . '</option>';
					}
				}
		
			}
			
			$info['options_catpd'] .= '</select>';
			
			if ($b['active'])
			{
				$info['active']="checked";
			}	
			if ($b['hot'])
			{
				$info['hot']="checked";
			}
			show_product_update_form($info);
		
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
		if ($in_name)
		{
		
			$a=array(
						'name'=>$in_name
					);
			
			if (compile_post('xoa_anh'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['image']='';
					$a['normal_image']='';
					$a['small_image']='';
			
			}		
			//echo $_FILES['image']['size']; die();
			if ($_FILES['image']['size'])
			{
				$in_image=get_new_file_name($_FILES['image']['name'],"product_");
				
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image',2,$in_image))
				{
					//Da upload thanh cong
					//delete old files
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					
					$a['image']=$file_upload->file_name;
					//echo $a['image']; die();
					$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
					
					if ($thumbnail)
					{
						$a['small_image']=$thumbnail['thumb'];
						$a['normal_image']=$thumbnail['normal'];
					}
					else
					{
						$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
					}
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
						if (check_remote_thumb($img_url)) 
						{
							//that remote file 's valid
							//delete old thumb files
							$sql="select * from product where id_product=".$id;
							$x=$DB->query($sql);
							if ($y=mysql_fetch_array($x))
							{
								$lastfile=$y['image'];
								$lastnormal=$y['normal_image'];
								$lastsmall=$y['small_image'];
								if ($lastfile||$lastnormal||$lastsmall)
								{
									if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
									{
										unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
									}							
									if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
									{
										unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
									}
									if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
									{
										unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
									}						
								}					
							}
							
							$a['image']=$img_url;
							if ($thumbnail=create_thumb_url($img_url))
							{
								$a['small_image']=$thumbnail['thumb'];
								$a['normal_image']=$thumbnail['normal'];
							}
							else
							{
								$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! H&#227;y xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
							}
							
						}
						else
						{
							$msg.="&#272;&#7883;nh d&#7841;ng file kh&#244;ng &#273;&#250;ng!<br>";
						}
					}
					else
					{
						$msg.="Kh&#244;ng truy nh&#7853;p &#273;&#432;&#7907;c file theo URL &#273;&#227; nh&#7853;p !<br>";
					}
				}
			}
			
			if (compile_post('xoa_anh1'))
			{
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image1'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}					
					}					
				}
				$a['image1']='';
			}
			if ($_FILES['image1']['size'])
			{
				$in_image=get_new_file_name($_FILES['image1']['name'],"product1_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image1',2,$in_image))
				{
					$a['image1']=$file_upload->file_name;
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			if (compile_post('xoa_anh2'))
			{
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image2'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}					
					}					
				}
				$a['image2']='';
			}
			if ($_FILES['image2']['size'])
			{
				$in_image=get_new_file_name($_FILES['image2']['name'],"product2_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image2',2,$in_image))
				{
					$a['image2']=$file_upload->file_name;
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			if (compile_post('xoa_anh3'))
			{
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image3'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}					
					}					
				}
				$a['image3']='';
			}
			if ($_FILES['image3']['size'])
			{
				$in_image=get_new_file_name($_FILES['image3']['name'],"product3_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image3',2,$in_image))
				{
					$a['image3']=$file_upload->file_name;
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			if (compile_post('xoa_anh4'))
			{
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image4'];
					if ($lastfile)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}					
					}					
				}
				$a['image4']='';
			}
			if ($_FILES['image4']['size'])
			{
				$in_image=get_new_file_name($_FILES['image4']['name'],"product4_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image4',2,$in_image))
				{
					$a['image4']=$file_upload->file_name;
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			$id_catpd_all = explode("_",compile_post('id_catpd_all'));
			
			$a['idroot']=$id_catpd_all[0];
			$a['parentid']=$id_catpd_all[1];
			if($id_catpd_all[2])
			{
				$a['id_catpd']=$id_catpd_all[2];
			}
			else
			{
				$a['id_catpd'] = $a['parentid'];
			}	

			$a['noi_dung']=$_POST['noi_dung'];
			
			$a['thu_tu']=compile_post('thu_tu');
			$a['active']=compile_post('active');
			$a['hot']=compile_post('hot');
			if (!$msg)		
			{
				$b=$DB->compile_db_update_string($a);
				$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
				$DB->query($sql);
				show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
			}
			else
			{
				show_message($msg);
			}
		}
		else
		{
			show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
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
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}	
					unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$y['image1']);
					unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$y['image2']);
					unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$y['image3']);
					unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$y['image4']);
				}
		$sql="Delete from product where id_product=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		showlist();
	}
	else
	{
		if (is_array($_POST['cid']))
		{
			$pid=intval($_GET['pid']);
			$i=0;
				foreach ($_POST['cid'] as $k=>$v)
				{
					$id=intval($_POST['cid'][$k]);
					//delete old files
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$sql="Delete from product where id_product=".$id;
					$DB->query($sql);
					$i++;
				}
				show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng <b>$i</b> s&#7843;n ph&#7849;m !");
				
		}
		showlist();				
	}

}
if ($_GET['code']=='28')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Active')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	if ($opt=='Deactive')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	showlist();		
}

if ($_GET['code']=='29')
{

	$txtsearch=$_GET['txtsearch'];
	$maxdp=intval($_GET['maxdp']);
	$pid=intval($_GET['pid']);

	if (!$maxdp)
	{
		$maxdp=10;
	}
	$dkproduct="";
	$dkproduct="where id_catpd=".$pid." ";
	if ($txtsearch)
	{
		$dkproduct.=" and product.name like '%".$txtsearch."%'";
	}			
	//Phan trang
	$sql="select count(*) as dem from product $dkproduct order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	//het phan phan trang 


	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dkproduct order by thu_tu asc,id_product desc $dklimit";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	while ($d=mysql_fetch_array($c))
	{
		if (isset($_POST['thu_tu_'.$d['id_product']]))
		{
			//echo $_POST['thu_tu_'.$d['id_product']].$d['name'].$d['id_product']."<br>";
			$thu_tu=compile_post('thu_tu_'.$d['id_product']);
			if ($thu_tu!=$d['thu_tu'])
			{
				$a['thu_tu']=$thu_tu;
				$b=$DB->compile_db_update_string($a);
				$sql="UPDATE product SET ".$b." WHERE id_product=".$d['id_product'];
				$DB->query($sql);
			}
		}
	}
	show_message("Change orders successfully !");
	showlist();
}
if ($_GET['code']=='30')
{
	init_search_form();
}
if ($_GET['code']=='31')
{
	process_search();
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