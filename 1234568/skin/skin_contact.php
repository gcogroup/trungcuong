<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_contact_list_h()
{
	//echo "<a href='main.php?act=contact&code=01'><img src='images/newtopic.gif' border='0'></a><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' id='AutoNumber1'>";
	echo "
	<tr>
	<td class='header2'>Ti&#234;u &#273;&#7873;</td>
	<td class='header2' width='100'>&nbsp;</td>
	</tr>
	";
	
}
function show_contact_list_f()
{
	echo "</table>

	
	
	</td></tr></table>";
}
function show_contact_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td><img src='images/bullet.gif'>&nbsp;".$info['name']."</td>
	<td align='center'><a href='javascript:confirmdelete(".$info['id_contact'].")'>Delete</a></td>
	</tr>
	";
	
}
function show_contact_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>

function formvalidator(theForm)
{
  if (theForm.title.value == '')
  {
    alert('Can nhap vao muc tieu de !');
    theForm.title.focus();
    return (false);
  }
  
}

</script>

	";
echo "
<form action='main.php?act=contact&code=email&id=".intval($_GET['id'])."' method='post' enctype='multipart/form-data' onSubmit='return formvalidator(this)'>
<input type='hidden' name='gone222' value='1'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>

  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#244;ng tin li&#234;n h&#7879;
  </tr>
  <tr>
    <td width='21%'>Họ tên</td>
    <td width='79%'>
      ".$info['name']."
	</td>
  </tr>
    <tr>
    <td width='21%'>Email</td>
    <td width='79%'>
      ".$info['email']."
	</td>
  </tr>
    <tr>
    <td width='21%'>Số điện thoại</td>
    <td width='79%'>
      ".$info['phone']."
	</td>
  </tr>

  <tr>
    <td width='21%' valign='top'>N&#7897;i dung</td>
    <td width='79%'>
      ".$info['noi_dung']."
	</td>
  </tr> 
     <tr height='40'>
    <td colspan='2'><strong><font color='red'>Trả lời khách hàng</font></strong></td>
    
	</td>
  </tr> 
   <tr>
    <td width='21%'>Tiêu đề Email</td>
    <td width='79%'>
   <input type='text' name='title' size='60'>
	</td>
  </tr>  
    <tr>
    <td width='21%'>N&#7897;i dung Email</td>
    <td width='79%'>
     
	</td>
  </tr>
   <tr>
    <td width='21%'>
     
	</td>
    <td width='79%'>  
	
 <textarea name='noi_dung' style='width:80%;height:300px;' class='ckeditor'></textarea>
  	</td>
  </tr>
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Gửi đi'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=contact&code=00'\" value='B&#7887; qua'></td>
  </tr>
  
</table>
</form>
";
}

?>