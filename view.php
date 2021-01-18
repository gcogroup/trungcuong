<?php
define('_VALID_TTH','1');
include("initcms.php");
$act=$_GET['act'];

if ($act == '' || $act == null) $act = 'home';
$path="modules/$act.php";

if (file_exists($path)) {

	include($path);
	
}


include("endcms.php");

?>