<?php
$s = $url_this = "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
$s = str_ireplace('127.0.0.1','localhost',$s,$re);
if(!!$re)
	header("Location:{$s}");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../js/sendEmail/sendEmail.js"></script>
	<link rel=stylesheet type="text/css" href="../css/sendEmail.css">
	<title>发送邮件</title>
</head>

<body class="main_body" >

	<div id="modelclick" class="main_div" title="邮件区" style="border:1px" >
	
		<div class="title_div">
			<span class="title">发送邮件</span>
		</div>

		<div>
			<input id="address" class="inputText" type="text" value="请输入收件人地址,多个地址之间使用;分隔"  onclick="javascript:if(this.value=='请输入收件人地址,多个地址之间使用;分隔'){ this.value=''};" onblur="javascript:if(this.value==''){ this.value='请输入收件人地址,多个地址之间使用;分隔'};" />
		</div>
		
		<div>
			<input id="mailTitle" class="inputText" type="text" value="请输入邮件标题"  onclick="javascript:if(this.value=='请输入邮件标题'){ this.value=''};" onblur="javascript:if(this.value==''){ this.value='请输入邮件标题'};" />
		</div>
	
		<textarea id="mailBody" rows=5 value="请输入邮件正文"  onclick="javascript:if(this.value=='请输入邮件正文'){ this.value=''};" onblur="javascript:if(this.value==''){ this.value='请输入邮件正文'};"></textarea>
		
		<div>
			<input type="button" id="sendEmail" value="发送" />
		</div>
		
		<div class="showReturn">
			<div class="showTag">发送状态: </div>
			<div class="showInfo"></div>
		</div>
	</div>
</body>
</html>