<?php
#author BossCuong
#email workandrelax@gmail.com
#yahoo cuongdecheiitmbkav

$tpl = new TemplatePower("template/home.htm");
$tpl->prepare();

$tpl->newBlock("gioi_thieu");
$gthieu = $DB->fetch_row($DB->query("select * from info where id_info='4' limit 1"));
$tpl->assign("name",$gthieu['name']);
$tpl->assign("gioi_thieu",$gthieu['gioi_thieu']);
$tpl->assign("link_video",$gthieu['link_video']);
$tpl->assign("site_email",$CONFIG['site_email']);
$tpl->assign("hotline",$CONFIG['hotline']);

$sql0="select id_catpd,name from catpd where active='1' and parentid=0 order by thu_tu asc,id_catpd desc" ;
$a0 = $DB->query($sql0);
	while ($b0 = mysql_fetch_array($a0))
	{
	$tpl->newBlock("all_may") ;
	$tpl->assign("name",$b0['name']) ;
	$tpl->assign("link_xemthem","index.php?act=pro&idroot=".$b0['id_catpd']."&name_en=".stripUnicode($b0['name'])) ;
	
	$sql="select * from product where idroot=".$b0['id_catpd']." and active='1' and hot='1' order by thu_tu asc,id_product desc limit 0,8" ;
	$a = $DB->query($sql);
		while ($b = mysql_fetch_array($a))
		{
			$tpl->newBlock("may_sub") ;
			$tpl->assign("name",$b['name']) ;
			$tpl->assign("small_image",$b['small_image']) ;
			$tpl->assign("image",$b['image']) ;
			$tpl->assign("link","index.php?act=pro&idroot=".$b['idroot']."&parentid=".$b['parentid']."&idcat=".$b['id_catpd']."&id=".$b['id_product']."&name_en=".stripUnicode($b['name'])) ;
		}
	}
//Khach hang

$a = $DB->query("select name,image,gioi_thieu from logo where active='1' and id_catlg='3' order by thu_tu asc, id_logo desc");
	while ($b = $DB->fetch_row($a))
	{
		$tpl->newBlock("khachhang") ;
		$tpl->assign("name",$b['name']) ;
		$tpl->assign("image",$b['image']) ;
		$tpl->assign("gioi_thieu",$b['gioi_thieu']) ;
	}

//video
$aa = $DB->query("select name,image,link_video from logo where active='1' and id_catlg='4' order by thu_tu asc, id_logo desc limit 0,3");
	while ($bb = $DB->fetch_row($aa))
	{
		$tpl->newBlock("video") ;
		$tpl->assign("name",$bb['name']) ;
		$tpl->assign("image",$bb['image']) ;
		$tpl->assign("link_video",$bb['link_video']) ;
	}
$tpl->printToScreen();
?>