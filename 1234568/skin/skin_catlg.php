<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_catlg_post_form()
{
	global $e_body,$info;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Enter in Name field !');
    theForm.name.focus();
    return (false);
  }
}
-->
</script>
	";
echo "
<form action='main.php?act=catlg&code=02&pid=".intval($_GET['pid'])."' method='post' enctype='multipart/form-data' name='catlg' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i Nh&#243;m
  </tr>
  
  <tr>
    <td width='21%'>Thu&#7897;c Nh&#243;m</td>
    <td width='79%'>
      ".$info['parentid']."
	</td>
  </tr>  
  <tr>
    <td width='21%'>T&#234;n Nh&#243;m</td>
    <td width='79%'>
      <input type='text' name='name' size='100'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='100' value='0'>
	</td>
  </tr>  
 <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'>
      <input type='checkbox' name='active' value='1' class='noborder' checked>&nbsp;Cho đăng
	</td>
  </tr>
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catlg&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
function show_catlg_list_h()
{
	global $info;
	echo "
	<script language=javascript>
	function s0confirmdelete(id,id_catlg)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=05&id='+id+'&pid='+id_catlg;
	}
	</script>	
	";
	
	
	//echo "<a href='main.php?act=catlg&code=01&pid=".$_GET['pid']."'><img src='images/newtopic.gif' border='0'></a><br><br>";
	//echo $info['root']."<br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Nh&#243;m tr&#7921;c thu&#7897;c 
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>";
	echo "
	<form method='post' name='frmthutu' action='main.php?act=catlg&code=09&pid=".intval($_GET['pid'])."'>
	<tr>
	<td class='header2'>T&#234;n</td>
	<td width='40' class='header2' align='center'>Thứ tự</a></td>
	<td width='80' class='header2' align='center'>Trạng thái</td>
	<td width='50' class='header2' align='center'>Sửa</td>
	<td width='50' class='header2' align='center'>Xóa</td>
	</tr>
	";
	
}
function show_catlg_list_f()
{
	echo "</table>
	<p align='right'>
	<input type='submit' value='Thay đổi thứ tự'></p>
	
	
	</td></form></tr></table>";
}
function show_catlg_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td>&nbsp;<img src='images/icon_folder_open.gif'>&nbsp;".$info['name']."</td>
	<td align='center'><input type='text' size='2' value='".$info['thu_tu']."' name='thu_tu_".$info['id_catlg']."'></td>
	<td align='center'><a href='main.php?act=catlg&code=08&id=".$info['id_catlg']."&opt=".$info['status']."&pid=".$_GET['pid']."'>".$info['status']."</a></td>
	<td align='center'><a href='main.php?act=catlg&code=03&id=".$info['id_catlg']."&pid=".$_GET['pid']."'>Sửa</a></td>
	<td align='center'><a href='javascript:s0confirmdelete(".$info['id_catlg'].",".intval($_GET['pid']).")'>Xóa</a></td>
	</tr>
	";
	
}
function show_catlg_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Enter in Name Field !');
    theForm.name.focus();
    return (false);
  }
}
-->
</script>
	";
echo "
<form action='main.php?act=catlg&code=04&id=".$_GET['id']."&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='catlg' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a Nh&#243;m  
  </tr>
 
  <tr>
    <td width='21%'>Thu&#7897;c Nh&#243;m</td>
    <td width='79%'>
      ".$info['parentid']."
	</td>
  </tr>   
  <tr>
    <td width='21%'>T&#234;n Nh&#243;m</td>
    <td width='79%'>
      <input type='text' name='name' size='100' value='".$info['name']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='100' value='".$info['thu_tu']."'>
	</td>
  </tr> 
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'>
      <input type='checkbox' name='active' value='1' class='noborder' ".$info['active'].">&nbsp;Cho đăng
	</td>
  </tr>   
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catlg&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
//logo
function show_logo_post_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Tieu de !');
    theForm.name.focus();
    return (false);
  } 
}
-->
</script>
	";

echo "
<form action='main.php?act=catlg&code=22&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='logo' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i Links - Logo - Banner
  </tr>
  
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='100'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Nh&#243;m</td>
    <td width='79%'>
			".$info['options_catlg']."
	</td>
  </tr>  
  <tr>
    <td width='21%' valign='top'>Logo - Banner</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image' size='100'><br>
	  URL:<br>
	  <input type='text' name='img_url' size='100'><br>
	  <font class='small'>D&#249;ng cho c&#225;c &#273;&#7883;nh d&#7841;ng: gif,jpg,png,swf</font>
	</td>
  </tr> 
      <tr>
    <td width='21%'>Giới thiệu</td>
    <td width='79%'>
      <textarea name='gioi_thieu' style='width:50%; height:100px;'></textarea>
	</td>
  </tr>
    <tr>
    <td width='21%'>Link video youtube</td>
    <td width='79%'>
      <textarea name='link_video' style='width:50%; height:100px;'></textarea>
	</td>
  </tr>
  <tr>
    <td width='21%'>Link</td>
    <td width='79%'>
      <input type='text' name='link' size='100'>
	</td>
  </tr>
   <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='100' value='0'>
	</td>
  </tr> 
  
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'>
      <input type='checkbox' name='active' value=1 checked class='noborder'>&nbsp;Cho đăng
	</td>
  </tr>    
  
        
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catlg&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
function show_logo_list_h()
{
	echo "
	<br>
	<script language=javascript>
	function sconfirmdelete(id,id_catlg)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=25&id='+id+'&pid='+id_catlg;
	}
	</script>	
	";
	//echo "<a href='main.php?act=catlg&code=21&pid=".$_GET['pid']."'><img src='images/newtopic.gif' border='0'></a><br><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Links - Logo - Banner tr&#7921;c thu&#7897;c
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>";
	echo "
	<form method='post' name='frmthutu2' action='main.php?act=catlg&code=29&pid=".intval($_GET['pid'])."'>
	<tr>
	<td class='header2'>Ti&#234;u &#273;&#7873;</td>
	<td width='40' class='header2' align='center'>Thứ tự</td>
	<td width='80' class='header2' align='center'>Trạng thái</td>
	<td width='50' class='header2' align='center'>Sửa</a></td>
	<td width='50' class='header2' align='center'>Xóa</td>
	</tr>
	";
	
}
function show_logo_list_f()
{
	echo "</table>
	<p align='right'>
	<input type='submit' value='Thay đổi thứ tự'></p>
	
	
	</td></form></tr></table>";
}
function show_logo_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td>".$info['name']."</td>
	<td align='center'><input type='text' size='2' value='".$info['thu_tu']."' name='thu_tu_".$info['id_logo']."'></td>
	<td align='center'><a href='main.php?act=catlg&code=28&id=".$info['id_logo']."&opt=".$info['status']."&pid=".intval($_GET['pid'])."'>".$info['status']."</a></td>
	<td width='50' align='center'><a href='main.php?act=catlg&code=23&id=".$info['id_logo']."&pid=".intval($_GET['pid'])."'>Sửa</a></td>
	<td width='50' align='center'><a href='javascript:sconfirmdelete(".$info['id_logo'].",".intval($_GET['pid']).")'>Xóa</a></td>
	</tr>
	";
	
}
function show_logo_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Tieu de !');
    theForm.name.focus();
    return (false);
  }
  
}
-->
</script>
	";
echo "
<form action='main.php?act=catlg&code=24&id=".$_GET['id']."&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='logo' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a Links - Logo - Banner
  </tr>
  
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='100' value='".$info['name']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Nh&#243;m</td>
    <td width='79%'>
			".$info['options_catlg']."
	</td>
  </tr>    
  <tr>
    <td width='21%' valign='top'>Logo - Banner</td>
    <td width='79%'>
	".$info['image']."
		Upload:<br>
      <input type='file' name='image' size='100'><br>
	  URL:<br>
	  <input type='text' name='img_url' size='100'><br>
	  <font class='small'>D&#249;ng cho c&#225;c &#273;&#7883;nh d&#7841;ng: gif,jpg,png,swf</font>
	</td>
  </tr> 
        <tr>
    <td width='21%'>Giới thiệu</td>
    <td width='79%'>
      <textarea name='gioi_thieu' style='width:50%; height:100px;'>".$info['gioi_thieu']."</textarea>
	</td>
  </tr> 
        <tr>
    <td width='21%'>Link video youtube</td>
    <td width='79%'>
      <textarea name='link_video' style='width:50%; height:100px;'>".$info['link_video']."</textarea>
	</td>
  </tr>
  <tr>
    <td width='21%'>Link</td>
    <td width='79%'>
      <input type='text' name='link' size='100' value='".$info['link']."'>
	</td>
  </tr>    
   
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='100' value='".$info['thu_tu']."'>
	</td>
  </tr>    
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'>
      <input type='checkbox' name='active' value=1  ".$info['active']." class='noborder'>&nbsp;Cho đăng
	</td>
  </tr>    
       
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catlg&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}


?>