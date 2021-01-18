<?php
define('_VALID_TTH','1');
include("initcms.php");

function replace_for_mod_rewrite(&$s) 
{
	$urlin = array(
	
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&name_en=([a-zA-Z0-9_-]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&p=([0-9]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&parentid=([0-9]*)&name_en=([a-zA-Z0-9_-]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&parentid=([0-9]*)&p=([0-9]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&parentid=([0-9]*)&idcat=([0-9]*)&name_en=([a-zA-Z0-9_-]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&parentid=([0-9]*)&idcat=([0-9]*)&p=([0-9]*)'",
	"'(?<!/)index.php\?act=pro&idroot=([0-9]*)&parentid=([0-9]*)&idcat=([0-9]*)&id=([0-9]*)&name_en=([a-zA-Z0-9_-]*)'",
	"'(?<!/)index.php\?act=video&p=([0-9]*)'",
	"'(?<!/)index.php\?act=video'",
	"'(?<!/)index.php\?act=contact'",
	"'(?<!/)index.php\?act=aboutus'",
	"'(?<!/)index.php'",
	);
	$urlout = array(
	"San-pham-\\1-\\2.html",
	"San-pham_p-\\1-\\2.html",
	"San-pham_g-\\1-\\2-\\3.html",
	"San-pham_g_p-\\1-\\2-\\3.html",
	"San-pham_c-\\1-\\2-\\3-\\4.html",
	"San-pham_c_p-\\1-\\2-\\3-\\4.html",
	"\\1-\\2-\\3-\\4-\\5.html",
	"Video_p-\\1.html",
	"Video.html",
	
	"Lien-he.html",
	"Cong-ty-tnhh-thuong-mai-dich-vu-Minh-Phong-Trung-Cuong.html",
	"home.html",
	);
$s = preg_replace($urlin, $urlout,$s);
return $s;
}

$act=$_GET['act'];

if ($act == '' || $act == null) $act = 'home';
$path="modules/$act.php";

if (file_exists($path)) {
	

	include("modules/header.php");
	include($path);
	if($act=='contact')
	{
		include("modules/footer1.php");
	}
	else
	{
		include("modules/footer.php");
	}
	
}
require_once("lib/rewriteurl_end.php");
include("endcms.php");

?>