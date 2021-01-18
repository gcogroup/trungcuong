<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function referbox($url,$msg,$s=3)
{ 
	header("Location: index3.php?url=".urlencode($url)."&msg=".urlencode($msg)."&s=$s"); 
}
//Check file
function is_remote($file_name) {
  return strpos($file_name, '://') > 0 ? 1 : 0;
}

function is_remote_file($file_name) {
  return is_remote($file_name) && preg_match("#\.[a-zA-Z0-9]{1,4}$#", $file_name) ? 1 : 0;
}

function is_local_file($file_name) {
  return !is_remote($file_name) && strpos($file_name, '/') !== false && preg_match("#\.[a-zA-Z0-9]{1,4}$#", $file_name) ? 1 : 0;
}

function check_remote_media($remote_media_file) {
  global $config;
  return is_remote($remote_media_file) && preg_match("#\.[".$CONFIG['allowed_mediatypes_match']."]+$#i", $remote_media_file) ? 1 : 0;
}

function check_local_media($local_media_file) {
  global $config;
  return !is_remote($local_media_file) && strpos($local_media_file, '/') !== false && preg_match("#\.[".$CONFIG['allowed_mediatypes_match']."]+$#i", $local_media_file) ? 1 : 0;
}

function check_remote_thumb($remote_thumb_file) {
  return is_remote($remote_thumb_file) && preg_match("#\.[gif|jpg|jpeg|png]+$#is", $remote_thumb_file) ? 1 : 0;
}

function check_local_thumb($remote_thumb_file) {
  return !is_remote($local_thumb_file) && strpos($local_thumb_file, '/') !== false && preg_match("#\.[gif|jpg|jpeg|png]+$#i", $local_thumb_file) ? 1 : 0;
}

function get_file_extension($file_name) {
  ereg("(.+)\.(.+)", basename($file_name), $regs);
  return strtolower($regs[2]);
}

function get_file_name($file_name) {
  ereg("(.+)\.(.+)", basename($file_name), $regs);
  return $regs[1];
}

function check_media_type($file_name) {
  global $config;
  return (in_array(get_file_extension($file_name), $CONFIG['allowed_mediatypes_array'])) ? 1 : 0;
}

function check_thumb_type($file_name) {
  return (preg_match("#(gif|jpg|jpeg|png)$#is", $file_name)) ? 1 : 0;
}

function check_executable($file_name) {
  if (substr(PHP_OS, 0, 3) == "WIN" && !eregi("\.exe$", $file_name)) {
    $file_name .= ".exe";
  }
  elseif (substr(PHP_OS, 0, 3) != "WIN") {
    $file_name = eregi_replace("\.exe$", "", $file_name);
  }
  return $file_name;
}
function remote_file_exists($url) { // similar to file_exists(), checks existence of remote files
  $url = trim($url);
  if (!preg_match("=://=", $url)) $url = "http://$url";
  if (!($url = @parse_url($url))) {
    return false;
  }
  if (!eregi("http", $url['scheme'])) {
    return false;
  }
  $url['port'] = (!isset($url['port'])) ? 80 : $url['port'];
  $url['path'] = (!isset($url['path'])) ? "/" : $url['path'];
  $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);
  if (!$fp) {
    return false;
  }
  else {
    $head = "";
    $httpRequest = "HEAD ".$url['path']." HTTP/1.1\r\n"
                  ."HOST: ".$url['host']."\r\n"
                  ."Connection: close\r\n\r\n";
    fputs($fp, $httpRequest);
    while (!feof($fp)) {
      $head .= fgets($fp, 1024);
    }
    fclose($fp);

    preg_match("=^(HTTP/\d+\.\d+) (\d{3}) ([^\r\n]*)=", $head, $matches);
    if ($matches[2] == 200) {
      return true;
    }
  }
}
//lay chieu dai va chieu rong cua file anh va file flash
function get_width_height($file_name)
{
    if ($image_info = @getimagesize($file_name)) 
	{
      $width_height = " ".$image_info[3];
      $width = $image_info[0];
      $height = $image_info[1];
	 	return $width_height;	
	 }
	 else
	 {
	 	return false;
	 }

}
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|&#227;|&#224;|&#225;|&#226;|&#226;́|&#226;̀|&#226;̣|&#226;̉|&#226;̃|á|à|ả|ạ|ắ|ằ|ẳ|ặ|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|&#193;|&#192;|&#195;|&#194;|&#194;́|&#194;̀|&#194;̣|&#194;̉|&#194;̃|Á|À|Ả|Ạ|Ắ|Ằ|Ẳ|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|&#233;|&#232;|&#234;|&#234;́|&#234;̀|&#234;̣|&#234;̉|&#234;̃|é|è|ẻ|ẽ|ẹ|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|&#201;|&#200;|&#202;|&#202;́|&#202;̀|&#202;̣|&#202;̉|&#202;̃|É|È|Ẻ|Ẽ|Ẹ|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị|&#237;|&#236;|í|ì|ỉ|ị|ĩ',	  
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị|&#205;|&#204;|Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|&#243;|&#242;|&#245;|&#244;|&#244;̀|&#244;́|&#244;̣|&#244;̉|&#244;̃|ó|ò|ỏ|õ|ọ|ố|ồ|ổ|ỗ|ộ|ớ|ờ|ở|ợ|ỡ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|&#211;|&#210;|&#213;|&#212;|&#212;̀|&#212;́|&#212;̣|&#212;̉|&#212;̃|Ó|Ò|Ỏ|Õ|Ọ|Ố|Ồ|Ổ|Ỗ|Ộ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|&#250;|&#249;|ú|ù|ủ|ũ|ụ|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|&#218;|&#217;|Ú|Ù|Ử|Ũ|Ụ|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ|&#253;|ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|&#221;|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
   );
   foreach($unicode as $khongdau=>$codau) {
	$arr=explode("|",$codau);
	$str = str_replace($arr,$khongdau,$str);
   }
   $str = str_replace(",","",$str);
   $str = str_replace("?","",$str);
   $str = str_replace('"','',$str);
   $str = str_replace("“","",$str);
   $str = str_replace("”","",$str);
   $str = str_replace(" ","-",$str);
   $str = str_replace(":","",$str);
   $str = str_replace("’","",$str);
   $str = str_replace("'","",$str);
   $str = str_replace(".","",$str);
   $str = str_replace("!","",$str);
   $str = str_replace("(","",$str);
   $str = str_replace(")","",$str);
   $str = str_replace("[","",$str);
   $str = str_replace("]","",$str);
   $str = str_replace("%","",$str);
   $str = str_replace("/","-",$str);
   $str = str_replace("&","-",$str);
     
return htmlspecialchars(mb_strtolower($str,'UTF-8')); 
}
function is_ajax() 
{

	if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
	{
		return true;
	}
	
	return false;
}
?>