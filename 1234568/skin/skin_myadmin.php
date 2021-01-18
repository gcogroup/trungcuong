<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
function show_mos_users_update_form($info)
{
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
<form action='main.php?act=myadmin&code=04' method='post' enctype='multipart/form-data' name='mos_users' onSubmit='return formvalidator(this)'>
<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #D8D8D8' bordercolor='#D8D8D8' width='100%' id='AutoNumber1'>
  <tr>
    <td width='100%' colspan='2' class='header'><img src='images/book.gif' width='18' height='15'>&nbsp;
    Update user
  </tr>
  <tr>
    <td width='21%'>Name</td>
    <td width='79%'>
      <input type='text' name='name' size='34' value=".$info['name'].">
	</td>
  </tr>
  <tr>
    <td width='21%'>Username</td>
    <td width='79%'>
      <input type='text' name='username' size='34' value=".$info['username'].">
	</td>
  </tr>  
  <tr>
    <td width='21%'>Email</td>
    <td width='79%'>
      <input type='text' name='email' size='34' value=".$info['email'].">
	</td>
  </tr> 
  <tr>
    <td width='21%'>Tel</td>
    <td width='79%'>
      <input type='text' name='telephone' size='34' value=".$info['telephone'].">
	</td>
  </tr>
  <tr>
    <td width='21%'>Current Password</td>
    <td width='79%'>
      <input type='password' name='password0' size='34'>
	</td>
  </tr>      
  <tr>
    <td width='21%'>New Password</td>
    <td width='79%'>
      <input type='password' name='password' size='34'>
	</td>
  </tr> 
  <tr>
    <td width='21%'>Verify Password</td>
    <td width='79%'>
      <input type='password' name='password2' size='34'>
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