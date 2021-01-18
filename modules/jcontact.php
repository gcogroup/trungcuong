<?php

if(!is_ajax())
{
	die('Truy cập trái phép!');
}

$name = compile_post('name');
$email = compile_post('email');
$content = compile_post('content');
$phone = compile_post('phone');

if($name && $email)
{
	$a = array();
	$a['name'] = $name;
	$a['email'] = $email;
	$a['noi_dung'] = $content;
	$a['phone'] = $phone;
	$a['ngay_dang'] = time();
	$a['type'] = '1';
	
	$b=$DB->compile_db_insert_string($a);
	$sql="INSERT INTO contact (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
	$DB->query($sql);
	echo '0' ;
}
else
{
	echo '1';
}	
?>