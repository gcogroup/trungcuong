<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_info_post_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>

function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Tieu de !');
    theForm.name.focus();
    return (false);
  }
  
}

</script>

	";

echo "
<form action='main.php?act=info&code=02' method='post' enctype='multipart/form-data' name='info' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i b&#224;i vi&#7871;t
  </tr>
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='100'>
	</td>
  </tr>
  <tr>
    <td width='21%' valign='top'>Gi&#7899;i thi&#7879;u</td>
    <td width='79%'>
      <textarea name='gioi_thieu' style='width:66%; height:200px;'></textarea>
	</td>
  </tr> 
   <tr>
    <td width='21%' valign='top'>  
 		N&#7897;i dung ch&#237;nh
  	</td>
	<td width='79%'>
	<textarea name='noi_dung' class='ckeditor'></textarea>
	</td>
  </tr>
    <tr>
    <td width='21%'>Link video youtube</td>
    <td width='79%'>
      <textarea name='link_video' style='width:65%; height:200px;'></textarea>
	</td>
  </tr>
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'></td>
  </tr>
</table>
</form>
";
}
function show_info_list_h()
{
	//echo "<a href='main.php?act=info&code=01'><img src='images/newtopic.gif' border='0'></a><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch b&#224;i vi&#7871;t
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' id='AutoNumber1'>";
	echo "
	<tr>
	<td class='header2'>T&#234;n b&#224;i vi&#7871;t</td>
	<td width='100' class='header2'>&nbsp;</a></td>
	<td width='100' class='header2'>&nbsp;</td>
	</tr>
	";
	
}
function show_info_list_f()
{
	echo "</table></td></tr></table>";
}
function show_info_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td><img src='images/bullet.gif'>&nbsp;".$info['name']."</td>
	<td width='100' align='center'><a href='main.php?act=info&code=03&id=".$info['id_info']."'>Sửa</a></td>
	<td width='100' align='center'><a href='javascript:confirmdelete(".$info['id_info'].")'>Xoá</a></td>
	</tr>
	";
	
}
function show_info_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>

function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Tieu de !');
    theForm.name.focus();
    return (false);
  }
  
}

</script>

	";
echo "
<form action='main.php?act=info&code=04&id=".$_GET['id']."' method='post' enctype='multipart/form-data' name='info' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a b&#224;i vi&#7871;t
  </tr>
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='100' value='".$info['name']."'>
	</td>
  </tr>
      <tr>
    <td width='21%' valign='top'>Gi&#7899;i thi&#7879;u</td>
    <td width='79%'>
      <textarea name='gioi_thieu' style='width:65%; height:200px;'>".$info['gioi_thieu']."</textarea>
	</td>
  </tr>
  <!-- Describe -->
    <tr>
    <td width='21%' valign='top'>N&#7897;i dung ch&#237;nh</td>
    <td width='79%'>
       <textarea name='noi_dung' class='ckeditor'>".$info['noi_dung']."</textarea>
	</td>
  </tr>
      <tr>
    <td width='21%'>Link video youtube</td>
    <td width='79%'>
      <textarea name='link_video' style='width:65%; height:200px;'>".$info['link_video']."</textarea>
	</td>
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