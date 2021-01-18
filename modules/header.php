<?php
#author BossCuong
#email workandrelax@gmail.com
#yahoo cuongdecheiitmbkav

$tpl = new TemplatePower("template/header.htm");
$tpl->prepare();

$tpl->assign("site_email",$CONFIG['site_email']);
$tpl->assign("tel",$CONFIG['tel']);
$tpl->assign("hotline",$CONFIG['hotline']);
$tpl->assign("address",$CONFIG['address']);
$idroot = clean_value($_GET['idroot']);
$parentid = clean_value($_GET['parentid']);
$idcat = clean_value($_GET['idcat']);
$id = clean_value($_GET['id']);

$value = clean_value($_GET["txtsearch"]);
$tpl->assign("txtsearch",$value);

if($act=='info')
{
	$tpl->assign("current_info","current");
}
elseif($act=='contact')
{
	$tpl->assign("current_contact","current");
}
elseif($act=='video')
{
	$tpl->assign("current_video","current");
}
else
{
	$tpl->assign("current_home","current");
}

if($idroot && $act=='pro')
{
	
	$name_h = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd='$idroot' limit 1"));
	$desc = $name_h['name'];
	$keyw = $name_h['name'];
	$sitename = $name_h['name'];
	$image_meta = "http://trungcuong.com/img/logo.jpg";
	
	if($parentid && !$idcat && !$id)
	{
		$name_h2 = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd='$parentid' limit 1"));
		$desc = $name_h['name'].", ".$name_h2['name'];
		$keyw = $name_h2['name'];
		$sitename = $name_h['name'].", ".$name_h2['name'];
		$image_meta = "http://trungcuong.com/img/logo.jpg";
	}
	elseif($parentid && $idcat && !$id)
	{
		$name_h3 = $DB->fetch_row($DB->query("select name from catpd where active='1' and id_catpd='$idcat' limit 1"));
		$desc = $name_h['name'].", ".$name_h3['name'];
		$keyw = $name_h3['name'];
		$sitename = $name_h['name'].", ".$name_h2['name'].", ".$name_h3['name'];
		$image_meta = "http://trungcuong.com/img/logo.jpg";
	}
	elseif($parentid && $idcat && $id)
	{
		$name_h4 = $DB->fetch_row($DB->query("select image,name from product where active='1' and idroot='$idroot' and parentid='$parentid' and id_product='$id' limit 1"));
		$desc = $name_h['name'].", ".$name_h4['name'];
		$keyw = $name_h4['name'];
		$sitename =$name_h4['name'];
		$image_meta = "http://trungcuong.com/upload/images/".$name_h4['image'];
	}
}

else
{
	$desc = $CONFIG['site_description'];
	$keyw = $CONFIG['site_keywords'];
	$sitename = $CONFIG['site_name'];
	$image_meta = "http://trungcuong.com/img/logo.jpg";
}

$tpl->assign("site_name",$sitename) ;
$tpl->assign("site_keywords",$keyw) ;
$tpl->assign("site_description",$desc) ;
$tpl->assign("image_meta",$image_meta) ;


$sql = $DB->query("select name,id_catpd from catpd where active='1' and id_catpd=1 order by thu_tu asc, id_catpd desc");
	if($b = $DB->fetch_row($sql))
	{
		$tpl->newBlock("menu");
		$tpl->assign("name",$b['name']) ;
		$tpl->assign("idcat",$b['id_catpd']) ;
		$tpl->assign("link","index.php?act=pro&idroot=".$b['id_catpd']."&name_en=".stripUnicode($b['name'])) ;

		$sql2 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$b['id_catpd']." order by thu_tu asc, id_catpd desc");
		while($b2 = $DB->fetch_row($sql2))
		{

			$tpl->newBlock("menu2");
			$tpl->assign("name",$b2['name']) ;
			$tpl->assign("link","index.php?act=pro&idroot=".$b['id_catpd']."&parentid=".$b2['id_catpd']."&name_en=".stripUnicode($b2['name'])) ;

			$check = $DB->fetch_row($DB->query("select id_catpd from catpd where active='1' and parentid=".$b2['id_catpd'].""));
			if($check['id_catpd'])
			{
				$tpl->assign("class_has_sub",'class="has-sub"');
				$tpl->newBlock("menu03");
				$sql3 = $DB->query("select name,id_catpd from catpd where active='1' and parentid=".$b2['id_catpd']." order by thu_tu asc, id_catpd desc");
				while($b3 = $DB->fetch_row($sql3))
				{	
					$tpl->newBlock("menu3");
					$tpl->assign("name",$b3['name']) ;
					$tpl->assign("link","index.php?act=pro&idroot=".$b['id_catpd']."&parentid=".$b2['id_catpd']."&idcat=".$b3['id_catpd']."&name_en=".stripUnicode($b3['name'])) ;
				}
			}
			else
			{
				$tpl->assign("class_has_sub",'');
			}
		}

	}

$sql_maytp = $DB->query("select name,id_catpd from catpd where active='1' and id_catpd=2 order by thu_tu asc, id_catpd desc");
	if($b_maytp = $DB->fetch_row($sql_maytp))
	{
		$tpl->newBlock("menu_may_thuc_pham");
		$tpl->assign("name",$b_maytp['name']) ;
		$tpl->assign("idcat",$b_maytp['id_catpd']) ;
		$tpl->assign("link","index.php?act=pro&idroot=".$b_maytp['id_catpd']."&name_en=".stripUnicode($b_maytp['name'])) ;
		
		$sql02_mtp = $DB->query("select name,id_catpd from catpd where active='1' and parentid='".$b_maytp['id_catpd']."' order by thu_tu asc, id_catpd desc");
		while($b02_mtp= $DB->fetch_row($sql02_mtp))
		{
			$tpl->newBlock("menu_may_thuc_pham1");
			$tpl->assign("name",$b02_mtp['name']) ;
			$tpl->assign("link","index.php?act=pro&idroot=".$b_maytp['id_catpd']."&parentid=".$b02_mtp['id_catpd']."&name_en=".stripUnicode($b02_mtp['name'])) ;
		}
	}
		
if($act=='home')
{
	$tpl->newBlock("slide");
	$sql = $DB->query("select name,image from logo where active='1' and id_catlg=2 order by thu_tu asc, id_logo desc");
	while($b = $DB->fetch_row($sql))
	{
		$tpl->newBlock("slide_image");
		$tpl->assign("image",$b['image']);
		$tpl->assign("name",$b['name']) ;
	}
}
$tpl->printToScreen();
?>