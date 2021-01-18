<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
?>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='30'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Qu&#7843;n l&#253; th&#244;ng tin li&#234;n h&#7879;</font></td>
					<td width='30'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
					<tr>
						<td width="50%">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
							<tr>
								<td width="10">&nbsp;</td>
								<td width="10"><img src='images/homeicon.gif' border='0'></td>
								<td width="3">&nbsp;</td>
								<td>
								<a href="main.php?act=contact&code=00">Danh s&#225;ch</a>
								</td>
							</tr>
							</table>
						</td>
						<td width="50%" align="right">&nbsp;

						</td>
					</table>
					
					</td>
				</tr>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='98%'>
							<tr>
								<td>						
<?php
require "./skin/skin_contact.php";
include_once("classes/class.phpmailer_ses.php");
function showlist()
{
	global $DB;
	show_contact_list_h();
	$sql="Select * from contact where type='1' order by id_contact desc";
	$a=$DB->query($sql);
	$info=array();
	$i=0;
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['id_contact']=$b['id_contact'];
		$info['name']=$b['name'];
		$info['subject']=$b['subject'];
		if (!$b['xem'])
		{
			$info['name']="<b>".$info['name']."</b> - Gửi vào lúc: ".date("d/m/Y H:i",$b['ngay_dang'])."";
		}
		else
		{
			$info['name']="".$info['name']." - Gửi vào lúc: ".date("d/m/Y H:i",$b['ngay_dang'])."";
		}	
		$info['name']='<a href="main.php?act=contact&code=03&id='.$b['id_contact'].'">'.$info['name'].'</a>';
		show_contact_cell($info);
	}
	show_contact_list_f();
}
function showportal()
{
	show_contact_post_form();
	showlist();
}	
if (!$_GET['code'] || $_GET['code']=='00')
{
	showlist();
}
if ($_GET['code']=='01')
{
	showportal();
}
if ($_GET['code']=='03')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from contact where id_contact=".$id;
		$a=$DB->query($sql);
		$info=array();
		$b=mysql_fetch_array($a);
		
		$info['id_contact']=$_GET['id'];
		$info['name']=$b['name'];
		$info['email']=$b['email'];
		$info['subject']=$b['subject'];	
		$info['phone']=$b['phone'];	
		$info['noi_dung']=$b['noi_dung'];
		show_contact_update_form($info);
		$sql="update contact set xem='1' where id_contact=".$id;
		$DB->query($sql);
		//showlist();
	}

}
if ($_GET['code']=='05')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Delete from contact where id_contact=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		//showportal();
		showlist();
	}

}
if($_GET['code']=='email')
{
	
	$id=intval($_GET['id']);
	
	$sql="Select * from contact where id_contact=".$id;
	$a=$DB->query($sql);
	$b=mysql_fetch_array($a);
	
	if(compile_post('gone222')=='1')
	{
		$to = $b['email'];
		$mail = new PHPMailer(true);  // the true param means it will throw exceptions on errors, which we need to catch
		$mail->IsSMTP();  // telling the class to use SMTP
		try{
			$mail->Host       = "maxsale.vn";  // SMTP server of Amazon SES
			$mail->Port       = "465";          // SMTP port of the Amazon SES
			$mail->Username   = "noreply@maxsale.vn";  // SMTP username (Amazon SES Credentials)
			$mail->Password   = "Ab123456!@#$%"; // SMTP password (Amazon SES Credentials)
			$mail->SMTPDebug  = 0;        // 1 to enables SMTP debug (for testing), 0 to disable debug (for production)
			$mail->SMTPAuth   = true;    // enable SMTP authentication
			//$mail->SMTPSecure = "tls";  // tls required for Amazon SES
			$mail->SetLanguage("vn", "");
			$body = $_POST['noi_dung'];
			$mail->SetFrom("noreply@maxsale.vn", "noreply@maxsale.vn");
			//$mail->AddReplyTo($reply_to, $reply_to_name);
			$mail->AddAddress($to, $b['name']);
			$mail->Subject    = $subject;
			$mail->MsgHTML($body);
			
			if($mail->Send())
			{
				show_message("Email đã được gửi tới khách hàng !");
			}
			else
			{
				show_message("Có lỗi trong qúa trình gửi!");
			}
		} 
		catch (phpmailerException $e) 
		{
			echo $e->errorMessage();  //Pretty error messages from PHPMailer
		} 
		catch (Exception $e) 
		{
			echo $e->getMessage();  //Boring error messages from anything else!
		}
	}
	showlist();

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