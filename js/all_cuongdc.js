
$(document).ready(function()
{

	$('#send_contact').click(function()
	{
		var name = $("#name").val();
		
		var email = $("#email").val();
		var content = $("#content").val();
		var phone = $("#phone").val();
		if(name=='')
		{
			$("#thongbao").html('Vui lòng nhập tên của mình!').fadeIn();
			$("#name").focus();
			return false;
		}
		else if(email=='')
		{
			$("#thongbao").html('Vui lòng nhập địa chỉ Email!').fadeIn();
			$("#email").focus();
			return false;
		}
		else if (email.indexOf('@',0) == -1 || email.indexOf('.',0) == -1  || email.length<10)
		{
			$("#thongbao").html('Địa chỉ Email sai, xin vui lòng liên hệ lại!').fadeIn();
			$("#email").select();
			return false;
		}

		else
		{
			$("#thongbao").html('Đang thực hiện...').fadeIn();
			var dataString = 'name='+name+'&email='+email+'&content='+content+'&phone='+phone+'';
			//alert(dataString); return;
			$.ajax({
			type: "POST",
			url: "view.php?act=jcontact",
			data: dataString,
			cache: false,
				success: function(output)
				{
					//alert(output); return ;
					if(output==1)
					{
						$("#thongbao").html('Bạn vui lòng nhập họ tên và Email!').fadeIn();
						return false;
					}
					else
					{
						$("#thongbao").html('Gửi thành công,chúng tôi sẽ sớm liên hệ lại!').fadeIn();
/*						$("#name").val('');
						$("#email").val('');
						$("#content").val('');
						$("#phone").val('');*/
						return false;
					}
				}
			});
		}
	return false;
	});

});
