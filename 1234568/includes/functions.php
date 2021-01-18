<?php
//require_once("$rootincludes/sessions.inc.php");
session_start();

session_register('re');

$re = $HTTP_REFERER;

require_once("$rootincludes/class.Template.inc.php");

require_once("$rootincludes/_class_mysql.php");

$db=new db_sql();
$db->connect();

///////Admin Group
function is_group($type) {
	global  $db,$valib_group;
	$group = explode(",",$valib_group);
	$num   = sizeof($group);
	$i     = 0;
	$okie='';
	for ($i;$i < $num;$i++) {
		$result = mysql_query("select is_$type from user_group where user_group='$group[$i]'");
		
		list($is_type)=mysql_fetch_array($result);
		if($is_type=="yes") {
			$okie=$okie.",1";
		}
	}
	if (ereg("1",$okie)) {
		return 1;
	}
	return 0;
	
}
//////Location
function redir($to) {
	echo "<SCRIPT LANGUAGE=\"JavaScript\">\n";
	echo "window.location = '$to'\n";
	echo "</SCRIPT>";
}
//////date to string
function datetime2Str($date){
	global $site;
	
	$d = split(' ', $date);
	$y = split('-', $d[0]);
	if($site[sdate]=='mdy')
	return "$y[1]$site[dsep]$y[2]$site[dsep]$y[0] $d[1]";
	elseif($site[sdate]=='dmy')
	return "$y[2]$site[dsep]$y[1]$site[dsep]$y[0] $d[1]";
	elseif($site[sdate]=='ymd')
	return "$y[0]$site[dsep]$y[1]$site[dsep]$y[2] $d[1]";
}
function uniqueArray($array)
{
	for ($i=0,$n=count($array);$i<$n;$i++)
	$u_array[$array[$i]] = 1;
	
	reset($u_array);
	for ($i=0,$n=count($u_array);$i<$n;$i++) {
		$unduplicated_array[] = key($u_array);
		next($u_array);
	}
	return $unduplicated_array;
}
// Function to remove HTML tags, Javascript,...
function filter($sstring)
{
	/**
	 * for ($i = 0; $i < strlen($sstring); $i++)
	 * if (!ereg("'", $sstring[$i])) ;
	 * }
	 */

	$search = array ("'<'", // Strip out javascript
		"'>'",
		"'[\/\!]*?[^<>]*?>'si", // Strip out html tags
		"'([\r\n])[\s]+'", // Strip out white space
		"'&(quote|#34);'i", // Replace html entities
		"'&(amp|#38);'i",
		"'&(lt|#60);'i",
		"'&(gt|#62);'i",
		"'&(nbsp|#160);'i",
		"'&(iexcl|#161);'i",
		"'&(cent|#162);'i",
		"'&(pound|#163);'i",
		"'&(copy|#169);'i",
		"'&#(\d+);'e"); // evaluate as php
	
	$replace = array ("",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"");
	$text = preg_replace ($search, $replace, $sstring);
	$text = ereg_replace("'", "", $text); 
	// $text=ereg_replace("\\", "", $text);
	return $text;
} 
////////// Begin Variables

#$db=new db_sql;
#$db->connect();

$raw=$db->query('select * from config');
while($res=$db->fetch_array($raw)){
	$$res['name']=$res[value];
	echo $res['var'];
}
unset($raw,$res);


// End variables

?>