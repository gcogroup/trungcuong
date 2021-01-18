<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_module_post_form()
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
<form action='main.php?act=module&code=02' method='post' enctype='multipart/form-data' name='module' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i
  </tr>
  <tr>
    <td width='21%'>M&#244; t&#7843;</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%'>T&#234;n file</td>
    <td width='79%'>
      <input type='text' name='gia_tri' size='34' value=''>
	</td>
  </tr>
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='34' value='0'>
	</td>
  </tr>  
  
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='active' value='1' class='noborder' checked>&nbsp;Active&nbsp;&nbsp;&nbsp;</td>
  </tr>  
  
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'></td>
  </tr>
</table>
</form>
";
}
function show_module_list_h()
{
	//echo "<a href='main.php?act=module&code=01'><img src='images/newtopic.gif' border='0'></a><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>";
	echo "
	<form method='post' name='frmthutu' action='main.php?act=module&code=09'>
	<tr>
	<td class='header2'>M&#244; t&#7843;</td>
	<td width='100' class='header2' align='center'>File</a></td>
	<td width='40' class='header2' align='center'>Order</a></td>
	<td width='50' class='header2'>&nbsp;</a></td>
	<td width='50' class='header2'>&nbsp;</a></td>
	<td width='50' class='header2'>&nbsp;</td>
	</tr>
	";
	
}
function show_module_list_f()
{
	echo "</table>
	<p align='right'>
	<input type='submit' value='Change Orders'></p>
	
	
	</td></form></tr></table>";
}
function show_module_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td><img src='images/bullet.gif'>&nbsp;".$info['name']."</td>
	<td align='center'>".$info['gia_tri']."</td>
	<td align='center'><input type='text' size='2' value='".$info['thu_tu']."' name='thu_tu_".$info['id_module']."'></td>
	<td align='center'><a href='main.php?act=module&code=08&id=".$info['id_module']."&opt=".$info['status']."'>".$info['status']."</a></td>
	<td align='center'><a href='main.php?act=module&code=03&id=".$info['id_module']."'>Update</a></td>
	<td align='center'><a href='javascript:confirmdelete(".$info['id_module'].")'>Delete</a></td>
	</tr>
	";
	
}
function show_module_update_form($info)
{
	global $e_body;
	echo "
<script Language='JavaScript'>
<!--
function formvalidator(theForm)
{
  if (theForm.name.value == '')
  {
    alert('Can nhap vao muc Mo ta !');
    theForm.name.focus();
    return (false);
  }
  
}
-->
</script>
	";
echo "
<form action='main.php?act=module&code=04&id=".$_GET['id']."' method='post' enctype='multipart/form-data' name='module' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a
  </tr>
  <tr>
    <td width='21%'>M&#244; t&#7843;</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value='".$info['name']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>T&#234;n file</td>
    <td width='79%'>
      <input type='text' name='gia_tri' size='34' value='".$info['gia_tri']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='34' value='".$info['thu_tu']."'>
	</td>
  </tr>   
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='checkbox' name='active' value='1' class='noborder' ".$info['active'].">&nbsp;Active&nbsp;&nbsp;&nbsp;</td>
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