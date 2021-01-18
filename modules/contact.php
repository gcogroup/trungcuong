<?php

$tpl = new TemplatePower("template/contact.htm");
$tpl->prepare();

$tpl->assign("site_email",$CONFIG['site_email']);
$tpl->assign("tel",$CONFIG['tel']);
$tpl->assign("hotline",$CONFIG['hotline']);
$tpl->assign("address",$CONFIG['address']);

$tpl->printToScreen();
?>