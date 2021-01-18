<?php
#author BossCuong
#email workandrelax@gmail.com
#yahoo cuongdecheiitmbkav

$tpl = new TemplatePower("template/info.htm");
$tpl->prepare();
$sql="select * from info where id_info='4' " ;
$a = $DB->query($sql) ;
if($b = mysql_fetch_array($a))
{
	$tpl->assign("name",$b['name']) ;
	$tpl->assign("noi_dung",$b['noi_dung']) ;
	$tpl->assign("link_video",$b['link_video']) ;
}
$tpl->assign("site_email",$CONFIG['site_email']);

$tpl->assign("hotline",$CONFIG['hotline']);

$tpl->printToScreen();
?>