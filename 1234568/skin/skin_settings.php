<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_settings_update_form($info)
{

echo "

<form action='main.php?act=settings&code=04' method='post' enctype='multipart/form-data' name='settings'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    C&#7845;u h&#236;nh chung
	</td>
  </tr>
  <tr>
    <td width='21%'>T&#234;n Website</td>
    <td width='79%'>
      <input type='text' name='setting_item[site_name]' size='100' value='".$info['site_name']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Admin email</td>
    <td width='79%'>
      <input type='text' name='setting_item[site_email]' size='100' value='".$info['site_email']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Document root</td>
    <td width='79%'>
      <input type='text' name='setting_item[document_root]' size='100' value='".$info['document_root']."'><font style='font-size:8pt'>&nbsp;&nbsp;DOCUMENT_ROOT: ".$_SERVER['DOCUMENT_ROOT']." (kh&#244;ng \"/\" &#7903; cu&#7889;i)</font>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Dir path</td>
    <td width='79%'>
      <input type='text' name='setting_item[dir_path]' size='100' value='".$info['dir_path']."'><br><font style='font-size:8pt'>Tr&#432;&#7901;ng h&#7907;p d&#249;ng &#273;&#432;&#7901;ng d&#7851;n http://tendomain.com/tenthumuc th&#236; Dir_path l&#224; /tenthumuc, n&#7871;u d&#249;ng http://tendomain.com th&#236; Dir_path &#273;&#7875; r&#7895;ng</font>
	</td>
  </tr>    
  <tr>
    <td width='21%'>Http host (http://)</td>
    <td width='79%'>
      <input type='text' name='setting_item[http_host]' size='100' value='".$info['http_host']."'><font style='font-size:8pt'>&nbsp;&nbsp;HTTP_HOST: ".$_SERVER['HTTP_HOST']." (kh&#244;ng \"/\" &#7903; cu&#7889;i)</font>
	</td>
  </tr>    
  
  <tr>
    <td width='21%'>&#272;&#7883;nh d&#7841;ng ng&#224;y th&#225;ng</td>
    <td width='79%'>
      <input type='text' name='setting_item[date_format]' size='100' value='".$info['date_format']."'>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Time offset</td>
    <td width='79%'>
      ".$info['select_time_offsets']."&nbsp;h&nbsp;&nbsp;Th&#7901;i gian hi&#7879;n t&#7841;i trong h&#7879; th&#7889;ng: ".date($info['date_format'].' '.$info['time_format'],time()+$info['time_offset']*3600)."
	  
	</td>
  </tr>
  <tr>
    <td width='21%'>D&#249;ng n&#233;n GZip</td>
    <td width='79%'>
      <input type='radio' name='setting_item[gz_compress]' class='noborder' value='1' ".$info['gz_compress_yes'].">&nbsp;C&#243;&nbsp;<input type='radio' name='setting_item[gz_compress]' class='noborder' value='0' ".$info['gz_compress_no'].">&nbsp;Kh&#244;ng
	</td>
  </tr>
    <tr>
    <td width='21%'>Meta keywords</td>
    <td width='79%'>
      <input type='text' name='setting_item[site_keywords]' size='100' value='".$info['site_keywords']."'>
	</td>
  </tr>

   <tr>
    <td width='21%'>Meta description</td>
    <td width='79%'>
      <input type='text' name='setting_item[site_description]' size='100' value='".$info['site_description']."'>
	</td>
  </tr>
    <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Thông tin liên hệ
	</td>
  </tr>
   <tr>
    <td width='21%'>Số hotline</td>
    <td width='79%'>
      <input type='text' name='setting_item[hotline]' size='100' value='".$info['hotline']."'>
	</td>
  </tr>
     <tr>
    <td width='21%'>Điện thoại bàn</td>
    <td width='79%'>
      <input type='text' name='setting_item[tel]' size='100' value='".$info['tel']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Máy công cụ:</td>
    <td width='79%'>
      <input type='text' name='setting_item[mobile_maycongcu]' size='100' value='".$info['mobile_maycongcu']."'>
	</td>
  </tr>
    <tr>
    <td width='21%'>Máy chế biến thực phẩm:</td>
    <td width='79%'>
      <input type='text' name='setting_item[mobile_maythucpham]' size='100' value='".$info['mobile_maythucpham']."'>
	</td>
  </tr>
    <tr>
    <td width='21%'>Địa chỉ:</td>
    <td width='79%'>
      <input type='text' name='setting_item[address]' size='100' value='".$info['address']."'>
	</td>
  </tr>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    C&#7845;u h&#236;nh upload file
	</td>
  </tr> 
  <tr>
    <td width='21%'>Upload path</td>
    <td width='79%'>
      <input type='text' name='setting_item[upload_media_path]' size='100' value='".$info['upload_media_path']."'>
	</td>
  </tr>  
   
  <tr>
    <td width='21%' valign='top'>Ki&#7875;u upload <br>(Khi c&#243; file tr&#249;ng t&#234;n tr&#234;n server)</td>
    <td width='79%' valign='top'>
      <input type='radio' name='setting_item[upload_mode]' value='1' class='noborder' ".$info['upload_mode_1'].">&nbsp;Ghi &#273;&#232; file<br>
	  <input type='radio' name='setting_item[upload_mode]' value='2' class='noborder' ".$info['upload_mode_2'].">&nbsp;Ghi file v&#7899;i t&#234;n kh&#225;c<br>
	  <input type='radio' name='setting_item[upload_mode]' value='3' class='noborder' ".$info['upload_mode_3'].">&nbsp;Kh&#244;ng ghi file m&#7899;i<br>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Ki&#7875;u file cho ph&#233;p</td>
    <td width='79%'>
      <input type='text' name='setting_item[allowed_mediatypes]' size='100' value='".$info['allowed_mediatypes']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>C&#7905; file max</td>
    <td width='79%'>
      <input type='text' name='setting_item[max_media_size]' size='100' value='".$info['max_media_size']."'>&nbsp;&nbsp;KB
	</td>
  </tr>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Image
	</td>
  </tr>	
   <tr>
    <td width='21%'>Đường dẫn Upload Editor</td>
    <td width='79%'>
      <input type='text' name='setting_item[upload_image_path_editor]' size='100' value='".$info['upload_image_path_editor']."'>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Upload image path</td>
    <td width='79%'>
      <input type='text' name='setting_item[upload_image_path]' size='100' value='".$info['upload_image_path']."'>
	</td>
  </tr>   
  
  <tr>
    <td width='21%'>Max. size (to create normal thumbnail)</td>
    <td width='79%'>
      <input type='text' name='setting_item[max_image_width]' size='100' value='".$info['max_image_width']."'>&nbsp;&nbsp;pixels
	</td>
  </tr>  
  <tr>
    <td width='21%'>Auto normal thumbnail size</td>
    <td width='79%'>
      <input type='text' name='setting_item[max_thumb_width]' size='100' value='".$info['max_thumb_width']."'>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Auto small thumbnail size</td>
    <td width='79%'>
      <input type='text' name='setting_item[auto_thumbnail_dimension]' size='100' value='".$info['auto_thumbnail_dimension']."'>
	</td>
  </tr>  
  <tr>
    <td width='21%'>Ch&#7919; m&#7901; trong &#7843;nh thumbnail</td>
    <td width='79%'>
      <input type='text' name='setting_item[watermark_text]' size='100' value='".$info['watermark_text']."'>
	</td>
  </tr> 
  <tr>
    <td width='100%' colspan='2'>&nbsp;</td>
  </tr>

  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'></td>
  </tr>
</table>
</form>
";
}

?>