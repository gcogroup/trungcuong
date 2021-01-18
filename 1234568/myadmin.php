<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>

<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">My Admin</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='100%'>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#DADBDC' width='98%'>
							<tr>
								<td>					

<?php
require "./skin/skin_myadmin.php";
	
	function check($info)
	{
		global $DB,$my;
		// Validate user information
		if (!$info['password0'])
		{
			show_message("C&#7847;n nh&#7853;p &#273;&#250;ng m&#7853;t kh&#7849;u hi&#7879;n th&#7901;i &#273;&#7875; ti&#7871;n h&#224;nh s&#7917;a &#273;&#7893;i !");
			return false;
		}
		else
		{
			$sql="select * from users where id_users=".intval($my['id'])." and username='".clean_value($my['username'])."'";
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				if (md5($info['password0'])!=$b['password'])
				{
					show_message("Sai m&#7853;t kh&#7849;u !");
					return false;
				}
			}
			else
			{
				show_message("Sai m&#7853;t kh&#7849;u !");
				return false;
			}
		}
		if (trim( $info['name'] ) == '') {
			show_message("Please enter name !<br>");
			return false;
		}

		if (trim( $info['username'] ) == '') {
			show_message("Please enter username !<br>");
			return false;
		}

		if (eregi( "[^0-9A-Za-z]", $info['username'])) {
			show_message(sprintf("Please enter a valid %s.  No spaces, more than %d characters and contain 0-9,a-z,A-Z", "login name.",8 )."<br>");
			return false;
		}

		if ((trim($info['email'] == "")) || (preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/", $info['email'] )==false)) {
			show_message("Invalid Email !<br>");
			return false;
		}
		if (strcasecmp($info['password'],$info['password2']))
		{
			show_message("Passwords not match ! Please retype !<br>");
			return false;
		}

		// check for existing name
		$sql="SELECT id_users FROM users ". "\nWHERE username='".$info['username']."' AND id_users!='".$info['id']."'";

		$a=$DB->query($sql);
		if ($b=mysql_fetch_array($a))
		{
			show_message("Username exitsted !<br>");
			return false;
		}
		return true;
	}
	
if (!$_GET['code'])
{
	if ($my['id'])
	{
		$sql="Select * from users where id_users=".intval($my['id']);
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id']=$b['id'];
			$info['name']=$b['name'];
			$info['username']=$b['username'];
			$info['email']=$b['email'];
			$info['telephone']=$b['telephone'];
			show_mos_users_update_form($info);
		}
	
	}

}
if ($_GET['code']=='04')
{
	$info['id']=intval($my['id']);
	$info['name']=compile_post('name');
	$info['username']=compile_post('username');
	$info['email']=compile_post('email');
	$info['telephone']=compile_post('telephone');
	$info['password0']=compile_post('password0');
	$info['password']=compile_post('password');
	$info['password2']=compile_post('password2');
	if (check($info))
	{
		$a=array();
		$a['name']=$info['name'];
		if ($info['username'])
		{
			$a['username']=$info['username'];
			$_SESSION["session_username"]=$a['username'];
		}
		$a['email']=$info['email'];
		$a['telephone']=$info['telephone'];	
		if ($info['password'])
		{
			$a['password']=md5($info['password']);
		}
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE users SET ".$b." WHERE id_users=".$info['id'];
		$DB->query($sql);
		show_message("Update user successfully !<br>");
		boink_it3('main.php?act=myadmin');
	}
	else
	{
		boink_it3('main.php?act=myadmin');
	}

}
?>
								<br><br>
								</td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>