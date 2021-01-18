<?php
#author Do Chi Cuong
#Email : workandrelax@gmail.com
#yahoo :cuongdecheiitmbkav

$tpl = new TemplatePower("template/footer.htm");
$tpl->prepare();

$tpl->assign("site_email",$CONFIG['site_email']);
$tpl->assign("tel",$CONFIG['tel']);
$tpl->assign("hotline",$CONFIG['hotline']);
$tpl->assign("address",$CONFIG['address']);

$tpl->printToScreen();

?>