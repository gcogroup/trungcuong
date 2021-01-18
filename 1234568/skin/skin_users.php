<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_users_post_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Ho ten !');
    theForm.name.focus();
    return (false);
  }
  
}
-->
</script>
	";

echo "
<form action='main.php?act=users&code=02' method='post' enctype='multipart/form-data' name='users' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i
  </tr>
  <tr>
    <td width='21%'>H&#7885; t&#234;n</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%' >Tên truy cập</td>
    <td width='79%'>
      <input type='text' name='username' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%' >Mật khẩu</td>
    <td width='79%'>
      <input type='password' name='password' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%' >Nhập lại mật khẩu</td>
    <td width='79%'>
      <input type='password' name='password2' size='34' value=''>
	</td>
  </tr>  
  <tr>
    <td width='21%' >Email</td>
    <td width='79%'>
      <input type='text' name='email' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%'>Tel</td>
    <td width='79%'>
      <input type='text' name='telephone' size='34' value=''>
	</td>
  </tr>  
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='super' value='1' class='noborder'>&nbsp;Super Admin&nbsp;&nbsp;&nbsp;</td>
  </tr>     
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='active' value='1' class='noborder' checked>&nbsp;Active&nbsp;&nbsp;&nbsp;</td>
  </tr>  
  <tr>
    <td width='21%' valign='top'>Ph&#7847;n qu&#7843;n lý</td>
    <td width='79%'>
	  ".$info['module_rows']."
	  </select>
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
function show_users_list_h()
{
	//echo "<a href='main.php?act=users&code=01'><img src='images/newtopic.gif' border='0'></a><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch người quản lý
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>";
	echo "
	<form method='post' name='frmthutu' action='main.php?act=users&code=09'>
	<tr>
	<td class='header2' width='100'>H&#7885; t&#234;n</td>
	<td width='100' class='header2' align='center'>Tên truy cập</td>
	<td width='220' class='header2' align='center'>Email</td>
	<td width='120' class='header2' align='center'>Số điện thoại</td>
	
	<td class='header2' align='center'>Ph&#7847;n qu&#7843;n tr&#7883;</td>	
	<td width='80' class='header2' align='center'>Trạng thái</td>
	<td width='50' class='header2' align='center'>Sửa</a></td>
	<td width='50' class='header2' align='center'>Xóa</td>
	</tr>
	";
	
}
function show_users_list_f()
{
	echo "</table>
	
	
	
	</td></form></tr></table>";
}
function show_users_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td valign='top'><img src='images/bullet.gif' valign='top'>&nbsp;".$info['name']."</td>
	<td align='center' valign='top'>".$info['username']."</td>
	<td align='center' valign='top'>".$info['email']."</td>
	<td align='center' valign='top'>".$info['telephone']."</td>
	
	<td valign='top'>".$info['modules']."</td>
	<td align='center' valign='top'><a href='main.php?act=users&code=08&id=".$info['id_users']."&opt=".$info['status']."'>".$info['status']."</a></td>
	<td align='center' valign='top'><a href='main.php?act=users&code=03&id=".$info['id_users']."'>Sửa</a></td>
	<td align='center' valign='top'><a href='javascript:confirmdelete(".$info['id_users'].")'>Xóa</a></td>
	</tr>
	";
	
}
function show_users_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.password.value == '')
  {
    alert('Can nhap vao mat khau truy cap !');
    theForm.password.focus();
    return (false);
  }
  if (theForm.password.value != theForm.password2.value)
  {
    alert('Mat khau khong trung nhau, hay thu lai !');
    theForm.password2.focus();
    return (false);
  }
  
}
-->
</script>
	";
echo "
<form action='main.php?act=users&code=04&id=".$_GET['id']."' method='post' enctype='multipart/form-data' name='users' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a
  </tr>
  <tr>
    <td width='21%'>Tên truy cập</td>
    <td width='79%'>
      <input type='text' name='username' size='34' value='".$info['username']."'>
	</td>
  </tr> 
   <tr>
    <td width='21%'>Mật khẩu</td>
    <td width='79%'>
      <input type='password' name='password' size='34' >
	</td>
  </tr>
   <tr>
    <td width='21%'>Nhập lại mật khẩu</td>
    <td width='79%'>
      <input type='password' name='password2' size='34'>
	</td>
  </tr>
  <tr>
    <td width='21%'>H&#7885; t&#234;n</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value='".$info['name']."'>
	</td>
  </tr>

  <tr>
    <td width='21%'>Email</td>
    <td width='79%'>
      <input type='text' name='email' size='34' value='".$info['email']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Tel</td>
    <td width='79%'>
      <input type='text' name='telephone' size='34' value='".$info['telephone']."'>
	</td>
  </tr> 

   
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='super' value='1' class='noborder' ".$info['super'].">&nbsp;Super Admin&nbsp;&nbsp;&nbsp;</td>
  </tr>     
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='active' value='1' class='noborder' ".$info['active'].">&nbsp;Active&nbsp;&nbsp;&nbsp;</td>
  </tr>   
  <tr>
    <td width='21%' valign='top'>Ph&#7847;n qu&#7843;n tr&#7883;</td>
    <td width='79%'>
	  ".$info['module_rows']."
	  </select>
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