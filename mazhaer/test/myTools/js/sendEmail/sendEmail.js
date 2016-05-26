$(function(){

	$('#sendEmail').click(function(){
	
		var postVal = new Object();
		var address = $.trim($('#address').val());
		var mailTitle = $('#mailTitle').val();
		var mailBody = $('#mailBody').val();
		
		if(!!address && address!='请输入收件人地址,多个地址之间使用;分隔'){
			postVal.address = address;
		}else{
			alert('请输入有效的收件人地址！');
			return false;
		}
		if(!!$.trim(mailTitle) && mailTitle!='请输入邮件标题'){
			postVal.mailTitle = mailTitle;
		}else{
			alert('请输入有效的邮件标题！');
			return false;
		}
		if(!!$.trim(mailBody) && mailBody!='请输入邮件正文'){
			postVal.mailBody = mailBody;
		}else{
			alert('请输入有效的邮件正文');
			return false;
		}
		
		 $.ajax({
			type : 'post',
			url : 'lib/SendMe.php',
			data : postVal,
			success : function(data){
				if(!!data && data!='false'){
					var htmlInfo = "";
					data = eval('('+data+')'); 
					for(var s in data){
						var flag = (data[s]) ? "<span class='success'>发送成功</span>" : "<span class='faild'>发送失败</span>";
						htmlInfo += "<div>"+s+" :"+flag+"</div>";
					}
					$('.showReturn').show();
					$('.showInfo').html(htmlInfo);
				}else{
					alert('未知错误！');
				}
			}
		}); 
	})

})