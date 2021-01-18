<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_catpd_post_form()
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
<form action='main.php?act=catpd&code=02&pid=".intval($_GET['pid'])."' method='post' enctype='multipart/form-data' name='catpd' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i Ch&#7911;ng lo&#7841;i
  </tr>
 
    <tr>
    <td width='21%'>Thuộc nhóm</td>
    <td width='79%'>
      ".$info['parentid']."
	</td>
  </tr>
  
  <tr>
    <td width='21%'>T&#234;n Ch&#7911;ng lo&#7841;i</td>
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
      <input type='checkbox' name='active' value=1 checked class='noborder'>&nbsp;Cho đăng
	</td>
  </tr>  

  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
function show_catpd_list_h()
{
	global $info;
	echo "
	<script language=javascript>
	function s0confirmdelete(id,id_catpd)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=05&id='+id+'&pid='+id_catpd;
	}
	</script>	
	";
	
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Ch&#7911;ng lo&#7841;i con 
			  </tr>
			  <tr>
			  	<td align='center'>
				<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' >
				<form method='post' name='frmthutu' action='main.php?act=catpd&code=09&pid=".intval($_GET['pid'])."'>
				<tr>
					<td style='padding-left:10;padding-right:10;padding-top:10;padding-bottom:10'>
			  ";	
	
	//echo "<a href='main.php?act=catpd&code=01&pid=".$_GET['pid']."'><img src='images/newtopic.gif' border='0'></a><br><br>";
	//echo $info['root']."<br>";
	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' id='AutoNumber1'>";
	echo "
	<tr>
	<td class='header2'>T&#234;n</td>
	<td width='40' class='header2' align='center'>Thứ tự</a></td>
	<td width='80' class='header2' align='center'>Trạng thái</td>
	<td width='50' class='header2' align='center'>Sửa</td>
	<td width='50' class='header2' align='center'>Xoá</td>
	</tr>
	";
	
}
function show_catpd_list_f()
{
	echo "</table>
	<p align='right'>
	<input type='submit' value='Thay đổi thứ tự'></p>
	
	</td></tr></form></table>
	
	</td></tr></table>";
}
function show_catpd_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td>&nbsp;<img src='images/icon_folder_open.gif'>&nbsp;".$info['name']."</td>
	<td align='center'><input type='text' size='2' value='".$info['thu_tu']."' name='thu_tu_".$info['id_catpd']."'></td>
	<td align='center'><a href='main.php?act=catpd&code=08&id=".$info['id_catpd']."&opt=".$info['status']."&pid=".$_GET['pid']."'>".$info['status']."</a></td>
	<td align='center'><a href='main.php?act=catpd&code=03&id=".$info['id_catpd']."&pid=".$_GET['pid']."'>Sửa</a></td>
	<td align='center'><a href='javascript:s0confirmdelete(".$info['id_catpd'].",".intval($_GET['pid']).")'>Xoá</a></td>
	</tr>
	";
	
}
function show_catpd_update_form($info)
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
<form action='main.php?act=catpd&code=04&id=".$_GET['id']."&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='catpd' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a Ch&#7911;ng lo&#7841;i  
  </tr>
      <tr>
    <td width='21%'>Thuộc nhóm</td>
    <td width='79%'>
      ".$info['parentid']."
	</td>
  </tr>
  <tr>
    <td width='21%'>T&#234;n Ch&#7911;ng lo&#7841;i</td>
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
      <input type='checkbox' name='active' value=1  ".$info['active']." class='noborder'>&nbsp;Cho đăng
	</td>
  </tr> 
  <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
//product
function show_product_post_form($info)
{
	global $e_body,$CONFIG;
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
<form action='main.php?act=catpd&code=22&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='product' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Th&#234;m m&#7899;i s&#7843;n ph&#7849;m
  </tr>
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='60'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Ch&#7911;ng lo&#7841;i</td>
    <td width='79%'>
			".$info['options_catpd']."
	</td>
  </tr> 
   
 
  <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image' size='40'></br>
	    <font class='small'>D&#249;ng cho c&#225;c &#273;&#7883;nh d&#7841;ng: gif,jpg,png</font>
	  </td>
	</tr>
	  <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 2</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image1' size='100'><br>
	</td>
  </tr> 
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 3</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image2' size='100'><br>
	</td>
  </tr>
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 4</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image3' size='100'><br>
	</td>
  </tr>
   <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 5</td>
    <td width='79%'>
		Upload:<br>
      <input type='file' name='image4' size='100'><br>
	</td>
  </tr>

    <tr>
    <td width='21%' valign='top'>N&#7897;i dung ch&#237;nh</td>
    <td width='79%'>
      <textarea name='noi_dung' class='ckeditor'></textarea>
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
      <input type='checkbox' name='hot' class='noborder' value=1>&nbsp;Sản phẩm nổi bật
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
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}
function show_product_list_h($info)
{
	echo "
	<br>
	<script language=javascript>
	function sconfirmdelete(id,id_catpd)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=25&id='+id+'&pid='+id_catpd;
	}
	</script>	
	";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				S&#7843;n ph&#7849;m tr&#7921;c thu&#7897;c
			  </tr>
			  <tr>
			  	<td align='center'>
				<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' >
				<tr>
					<td style='padding-left:10;padding-right:10;padding-top:10;padding-bottom:10'>
			  ";	
	
	//hien thi moi trang, search, ...
	$maxdp=intval($_GET['maxdp']);
	if (!$maxdp)
	{
		$maxdp=10;
	}
	$str="";
	for ($i=1;$i<=10;$i++)
	{
		$str.="<option value='".($i*10)."'";
		if ($maxdp==($i*10))
		{
			$str.=" selected";
		}
		$str.=">".($i*10)."</option>";
	}
	
	echo "
	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%'>
	<form name='frmpaging' method='get' action='main.php'>
	<input type='hidden' name='act' value='catpd'>
	<input type='hidden' name='code' value='00'>
	<input type='hidden' name='pid' value='".intval($_GET['pid'])."'>

	<tr>
		<td width='95' style='font-size:8pt'>Th&#7875; hi&#7879;n m&#7895;i trang : </td>
		<td width='60'>
			<select name='maxdp' style='width:50px'>
				".$str."
			</select>
		</td>
		<td style='font-size:8pt'>trong t&#7893;ng s&#7889; <b>".$info['dem']."</b> s&#7843;n ph&#7849;m :: </td>
		<td width='45' style='font-size:8pt'>T&#236;m ki&#7871;m: </td>
		<td width='110' style='font-size:8pt'><input type='text' name='txtsearch' style='width:100px' value='".$_GET['txtsearch']."'></td>
		<td width='100' style='font-size:8pt'>Theo ch&#7911;ng lo&#7841;i: </td>
		<td width='220'>".$info['showcatpds']."</td>		
		<td width='30' align='right'><input type='image' src='images/go.gif' class='noborder'></td>
	</tr>
	</form>
	</table>
	<br>
	";
	
	
	//echo "<a href='main.php?act=catpd&code=21&pid=".$_GET['pid']."'><img src='images/newtopic.gif' border='0'></a><br><br>";

	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' id='AutoNumber1'>";
	echo "
	<script type='text/javascript'>
	function checkAll( n ) {
		var f = document.frmthutu2;
		var c = f.toggle.checked;
		var n2 = 0;
		for (i=1; i <= n; i++) {
			cb = eval( 'f.cb' + i );
			if (cb) {
				cb.checked = c;
				n2++;
			}
		}
		if (c) {
			document.frmthutu2.boxchecked.value = n2;
		} else {
			document.frmthutu2.boxchecked.value = 0;
		}
	}
	function deleteselected()
	{
		if (confirm('Are you sure to delete ?'))
		{
			document.frmthutu2.action='main.php?act=catpd&code=25&pid=".intval($_GET['pid'])."&maxdp=".intval($_GET['maxdp'])."&txtsearch=".$_GET['txtsearch']."';
			document.frmthutu2.submit();
		}
	}
	</script>
	
	<form method='post' name='frmthutu2' action='main.php?act=catpd&code=29&pid=".intval($_GET['pid'])."&maxdp=".intval($_GET['maxdp'])."&txtsearch=".$_GET['txtsearch']."'>
	<input type='hidden' name='boxchecked' value='0'>
	<tr>
	<td width='7' class='header2'><input type='checkbox' name='toggle' value='' onClick='checkAll(".$info['dem_i'].");' class='noborder'></td>
	<td class='header2'>T&#234;n</td>
	<td width='40' class='header2' align='center'>Thứ tự</a></td>
	<td width='80' class='header2' align='center'>Trạng thái</a></td>
	<td width='50' class='header2' align='center'>Sửa</a></td>
	<td width='50' class='header2' align='center'>Xoá</td>
	</tr>
	";
	
}
function show_product_list_f($info)
{
	echo "
	</table>
	<br>
	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%'>
	<tr>
		<td>With selected: <a href='javascript:deleteselected();'><img src='images/remove.gif' alt='Delete' border='0'></a>&nbsp; <a href='javascript:deleteselected();'>Delete</a></td>
		<td width='100' align='right'><input type='submit' value='Change Orders'></td>
	</tr>
	</table>
	<br>
	<div align='center'>".$info['navpage']."</div>
		</td></tr></table>
	</td></tr></form></table>";
}
function show_product_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td width='7' align='center'><input type='checkbox' id='cb".$info['i']."' name='cid[]' value='".$info['id_product']."' class='noborder'></td>
	<td>&nbsp;<img src='images/bullet.gif'>&nbsp;<font class='small'><b>".$info['name']."</b>
		<br>
		
		&nbsp;&nbsp;- Ng&#432;&#7901;i &#273;&#259;ng: ".$info['user_name']."<br>
		&nbsp;&nbsp;- Ng&#224;y &#273;&#259;ng: ".$info['ngay_dang']."<br>
		</font>
	</td>
	<td align='center'><input type='text' size='2' value='".$info['thu_tu']."' name='thu_tu_".$info['id_product']."'></td>
	<td align='center'><a href='main.php?act=catpd&code=28&id=".$info['id_product']."&opt=".$info['status']."&pid=".intval($_GET['pid'])."'>".$info['status']."</a></td>
	<td width='50' align='center'><a href='main.php?act=catpd&code=23&id=".$info['id_product']."&pid=".intval($_GET['pid'])."'>Sửa</a></td>
	<td width='50' align='center'><a href='javascript:sconfirmdelete(".$info['id_product'].",".intval($_GET['pid']).")'>Xoá</a></td>
	</tr>
	";
	
}
function show_product_update_form($info)
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
	  else if (theForm.id_catpd_all.value == '0')
	  {
		alert('Bạn cần chọn danh mục sản phẩm !');
		theForm.id_catpd_all.focus();
		return (false);
	  }
	  
	}

</script>

	";
echo "
<form action='main.php?act=catpd&code=24&id=".$_GET['id']."&pid=".$_GET['pid']."' method='post' enctype='multipart/form-data' name='product' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    S&#7917;a ch&#7919;a s&#7843;n ph&#7849;m
  </tr>
  <tr>
    <td width='21%'>Ti&#234;u &#273;&#7873;</td>
    <td width='79%'>
      <input type='text' name='name' size='60' value='".$info['name']."'>
	</td>
  </tr>
  <tr>
    <td width='21%'>Ch&#7911;ng lo&#7841;i</td>
    <td width='79%'>
			".$info['options_catpd']."
	</td>
 
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh</td>
    <td width='79%'>
	".$info['image']."
		Upload:<br>
      <input type='file' name='image' size='40'><br>
	</td>
  </tr>  
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 2</td>
    <td width='79%'>
	".$info['image1']."
		Upload:<br>
      <input type='file' name='image1' size='100'><br>
	</td>
  </tr> 
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 3</td>
    <td width='79%'>
	".$info['image2']."
		Upload:<br>
      <input type='file' name='image2' size='100'><br>
	</td>
  </tr>
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 4</td>
    <td width='79%'>
	".$info['image3']."
		Upload:<br>
      <input type='file' name='image3' size='100'><br>
	</td>
  </tr>
    <tr>
    <td width='21%' valign='top'>H&#236;nh &#7843;nh 5</td>
    <td width='79%'>
	".$info['image4']."
		Upload:<br>
      <input type='file' name='image4' size='100'><br>
	</td>
  </tr>
     <tr>
    <td width='21%' valign='top'>N&#7897;i dung ch&#237;nh</td>
    <td width='79%'>
       <textarea name='noi_dung' style='width:98%;height:400px;' class='ckeditor'>".$info['noi_dung']."</textarea>
	</td>
  </tr>
  
  <tr>
    <td width='21%'>Th&#7913; t&#7921;</td>
    <td width='79%'>
      <input type='text' name='thu_tu' size='60' value='".$info['thu_tu']."'>
	</td>
  </tr>  
    <tr>
    <td width='21%'>&nbsp;</td>
    <td width='79%'>
      <input type='checkbox' name='hot' value=1  ".$info['hot']." class='noborder'>&nbsp;Sản phẩm nổi bật
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
    <td width='79%'><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'>&nbsp;&nbsp;<input type='button' onClick=\"window.location='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'\" value='B&#7887; qua'></td>
  </tr>
</table>
</form>
";
}

//FOR SEARCH 03
function showsearchform($info)
{
	echo "
	<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
	<form name='frmpaging' method='get' action='main.php'>
	<input type='hidden' name='act' value='catpd'>
	<input type='hidden' name='code' value='31'>
	  
	  
	  <tr>
		<td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
		T&#236;m ki&#7871;m s&#7843;n ph&#7849;m
	  </tr>
	  <tr>
		<td width='150'>T&#236;m ki&#7871;m</td>
		<td>
		  <input type='text' name='txtsearch' size='60' value='".$info['txtsearch']."'>
		</td>
	  </tr>
	  <tr>
		<td width='150'>&nbsp;</td>
		<td>
		  <input type='checkbox' name='searchgt' value='1' ".$info['check_searchgt']." class='noborder'>
		  &nbsp;<font class='small'>T&#236;m c&#7843; trong ph&#7847;n gi&#7899;i thi&#7879;u, n&#7897;i dung</font>
		</td>
	  </tr>	  
	  <tr>
	  	<td>Theo ch&#7911;ng lo&#7841;i: </td>
		<td>".$info['showcatpds']."</td>	  
	  </tr>
	  <tr>
	  	<td>Theo ng&#432;&#7901;i &#273;&#259;ng: </td>
		<td>".$info['showusers']."</td>	  
	  </tr>	 
	  <tr>
	  	<td colspan='2'><font class='small'><b>Ng&#224;y &#273;&#259;ng</b></font></td>
	  </tr> 
	  <tr>
	  	<td>T&#7915; ng&#224;y: </td>
		<td>".$info['showfrom']."</td>	  
	  </tr>	 
	  <tr>
	  	<td>&#272;&#7871;n ng&#224;y: </td>
		<td>".$info['showto']."</td>	  
	  </tr>	 	  
	  <tr>
	  	<td colspan='2'>&nbsp;</td>
	  </tr>	  	  
	  
	  <tr>
		<td>&nbsp;</td>
		<td><input type='submit' value='Ch&#7845;p nh&#7853;n'>&nbsp;&nbsp;<input type='reset' value='Nh&#7853;p l&#7841;i'></td>
	  </tr>	  
	  </form>
	</table>
	
	";

}

function search_show_product_list_h($info)
{
	echo "
	<br>
	<script language=javascript>
	function sconfirmdelete(id,id_catpd)
	{
		var del=confirm('Ban chac chan muon xoa ?');
		if (del==true) document.location='main.php?act={$_GET['act']}&code=25&id='+id+'&pid='+id_catpd;
	}
	</script>	
	";
	echo "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%' id='AutoNumber1'>
			  <tr>
				<td width='100%' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
				Danh s&#225;ch k&#7871;t qu&#7843; t&#236;m ki&#7871;m
			  </tr>
			  <tr>
			  	<td align='center'>
				<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' >
				<tr>
					<td style='padding-left:10;padding-right:10;padding-top:10;padding-bottom:10'>
			  ";	
	
	//hien thi moi trang, search, ...
	$maxdp=intval($_GET['maxdp']);
	if (!$maxdp)
	{
		$maxdp=10;
	}
	$str="";
	for ($i=1;$i<=10;$i++)
	{
		$str.="<option value='".($i*10)."'";
		if ($maxdp==($i*10))
		{
			$str.=" selected";
		}
		$str.=">".($i*10)."</option>";
	}
	
	echo "
	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%'>
	<form name='frmpaging' method='get' action='main.php'>
	<input type='hidden' name='act' value='catpd'>
	<input type='hidden' name='code' value='31'>
	<input type='hidden' name='txtsearch' value='".$_GET['txtsearch']."'>
	<input type='hidden' name='searchgt' value='".$_GET['searchgt']."'>
	<input type='hidden' name='idcatpd' value='".$_GET['idcatpd']."'>
	<input type='hidden' name='iduser' value='".$_GET['iduser']."'>
	<input type='hidden' name='fd' value='".$_GET['fd']."'>
	<input type='hidden' name='fm' value='".$_GET['fm']."'>
	<input type='hidden' name='fy' value='".$_GET['fy']."'>
	<input type='hidden' name='td' value='".$_GET['td']."'>
	<input type='hidden' name='tm' value='".$_GET['tm']."'>
	<input type='hidden' name='ty' value='".$_GET['ty']."'>
	<tr>
		<td>&nbsp;</td>
		<td width='95' style='font-size:8pt'>Th&#7875; hi&#7879;n m&#7895;i trang : </td>
		<td width='60'>
			<select name='maxdp' style='width:50px'>
				".$str."
			</select>
		</td>
		<td style='font-size:8pt' width='140'>trong t&#7893;ng s&#7889; <b>".$info['dem']."</b> s&#7843;n ph&#7849;m :: </td>
		<td width='30' align='right'><input type='image' src='images/go.gif' class='noborder'></td>
		
	</tr>
	</form>
	</table>
	<br>
	";
	
	
	//echo "<a href='main.php?act=catpd&code=21&pid=".$_GET['pid']."'><img src='images/newtopic.gif' border='0'></a><br><br>";

	echo "<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000080' bordercolor='#9999FF' width='100%' id='AutoNumber1'>";
	echo "
	<tr>
	<td class='header2'>Ti&#234;u &#273;&#7873;</td>
	<td width='80' class='header2' align='center'>Trạng thái</a></td>
	<td width='50' class='header2' align='center'>Sửa</a></td>
	<td width='50' class='header2' align='center'>Xoá</td>
	</tr>
	";
	
}
function search_show_product_list_f($info)
{
	echo "
	</table>
	<br>
	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #9999FF' bordercolor='#9999FF' width='100%'>
	<tr>
		<td>".$info['navpage']."&nbsp;</td>
	</tr>
	</table>
		</td></tr></table>
	</td></tr></table>";
}
function search_show_product_cell($info)
{
	echo "
	<tr onmouseover=navBar(this,1,1) onmouseout=navBar(this,0,1)>
	<td>&nbsp;<img src='images/bullet.gif'>&nbsp;<font class='small'><b>".$info['name']."</b>
		<br>
		
		&nbsp;&nbsp;- Ng&#432;&#7901;i &#273;&#259;ng: ".$info['user_name']."<br>
		&nbsp;&nbsp;- Ng&#224;y &#273;&#259;ng: ".$info['ngay_dang']."<br>
		</font>
	</td>
	<td align='center'><a href='main.php?act=catpd&code=28&id=".$info['id_product']."&opt=".$info['status']."&pid=".$info['id_catpd']."'>".$info['status']."</a></td>
	<td width='50' align='center'><a href='main.php?act=catpd&code=23&id=".$info['id_product']."&pid=".$info['id_catpd']."'>Sửa</a></td>
	<td width='50' align='center'><a href='javascript:sconfirmdelete(".$info['id_product'].",".$info['id_catpd'].")'>Xoá</a></td>
	</tr>
	";
	
}


?>