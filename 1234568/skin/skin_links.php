<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_links_post_form()
{
echo "
<form action='main.php?act=links&code=02' method='post' enctype='multipart/form-data' name='links'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i Li&#234;n k&#7871;t Website
  </tr>
  <tr>
    <td width='21%'>T&#234;n Website</td>
    <td width='79%'>
      <input type='text' name='name' size='34'><br><br>
	  N&#7871;u mu&#7889;n th&#234;m ph&#226;n c&#225;ch \"-----------\", h&#227;y &#273;&#7875; tr&#7889;ng m&#7909;c T&#234;n, v&#224; nh&#7845;n \"Ch&#7845;p nh&#7853;n\"
	<br><br>
	</td>
  </tr>
  <tr>
    <td width='21%'>&#272;&#432;&#7901;ng d&#7851;n</td>
    <td width='79%'>
      <input type='text' name='links' size='34' value='http://'>
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
function show_links_list_h()
{
	echo "<a href='main.php?act=links&code=01'><img src='images/newtopic.gif' border='0'></a><br>";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch Wallpaper
			  </tr>
			  <tr>
			  	<td>
			  ";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>";
	echo "
	<tr>
	<td class='header2'>T&#234;n Website</td>
	<td width='100' class='header2'>&nbsp;</a></td>
	<td width='100' class='header2'>&nbsp;</td>
	</tr>
	";
	
}
function show_links_list_f()
{
	echo "</table></td></tr></table>";
}
function show_links_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td><img src='images/bullet.gif'>&nbsp;".$info['name']."</td>
	<td width='100' align='center'><a href='main.php?act=links&code=03&id=".$info['id_links']."'>Update</a></td>
	<td width='100' align='center'><a href='javascript:confirmdelete(".$info['id_links'].")'>Delete</a></td>
	</tr>
	";
	
}
function show_links_update_form($info)
{
echo "
<form action='main.php?act=links&code=04&id=".$_GET['id']."' method='post' enctype='multipart/form-data' name='links'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a li&#234;n k&#7871;t Website
  </tr>
  <tr>
    <td width='21%'>T&#234;n Website</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value='".$info['name']."'><br><br>
	  N&#7871;u mu&#7889;n th&#234;m ph&#226;n c&#225;ch \"-----------\", h&#227;y &#273;&#7875; tr&#7889;ng m&#7909;c T&#234;n, v&#224; nh&#7845;n \"Ch&#7845;p nh&#7853;n\"
	<br><br>
	</td>
  </tr>
  <tr>
    <td width='21%'>&#272;&#432;&#7901;ng d&#7851;n</td>
    <td width='79%'>
      <input type='text' name='links' size='34' value='".$info['links']."'>
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