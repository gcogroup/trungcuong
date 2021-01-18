<?php
session_name( 'TTHadmin' );
session_start();
define('_VALID_TTH','1');
require( "../../lib/mySQL.php" );
require ("../../conf.php");

// must start the session before we create the mainframe object
//if ($_SESSION["session_username"] && $_SESSION["session_usertype"] && $_SESSION["session_user_id"] && $_SESSION["session_logintime"])
//{
//START
	$my['username']=$_SESSION["session_username"];
	$my['id']=$_SESSION["session_user_id"];
	$my['usertype']=$_SESSION["session_usertype"];
	$my['session_logintime']=$_SESSION["session_logintime"];

	$DB = new db_driver;
	//Database
	$DB->obj['sql_database']     = $config['dbname'];
	//Username
	$DB->obj['sql_user']         = $config['username'];
	//Password
	$DB->obj['sql_pass']         = $config['password'];
	//Host. VD: localhost
	$DB->obj['sql_host']         = $config['host'];
	// Get a DB connection

	$DB->connect();
	//$rs=$DB->query($sql);
	//get configuration settings
	$CONFIG=array();
	$sql="select * from settings";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$CONFIG[$b['setting_name']]=$b['setting_value'];
	}
	$CONFIG['allowed_mediatypes'] = str_replace(" ", "", $CONFIG['allowed_mediatypes']);
	$CONFIG['allowed_mediatypes_array'] = explode(",", $CONFIG['allowed_mediatypes']);
	$CONFIG['allowed_mediatypes_match'] = str_replace(",", "|", $CONFIG['allowed_mediatypes']);	
	$CONFIG['time_offset']=intval($CONFIG['time_offset'])*60*60;
	if (!$CONFIG['document_root'])
	{
		$CONFIG['root_path']=$_SERVER['DOCUMENT_ROOT'].$CONFIG['dir_path']."/";
	}
	else
	{
		$CONFIG['root_path']=$CONFIG['document_root'].$CONFIG['dir_path']."/";
	}
	//$CONFIG['root_path_dev']=substr($CONFIG['root_path'],0,-1);
	$CONFIG['root_path_dev']=$CONFIG['document_root'];
//}
/*
else
{
	echo "Access's denied ! Try logging in again !";
	exit();
}
*/
?>