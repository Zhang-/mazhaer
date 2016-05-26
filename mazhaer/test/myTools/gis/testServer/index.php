<?php
$s = $url_this = "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
$s = str_ireplace('localhost','127.0.0.1',$s,$re);
if(!!$re)
	header("Location:{$s}");
	
set_time_limit(600);
ini_set('memory_limit', '2048M');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/numeral.js"></script> 
	<script type="text/javascript" src="js/testServer/testServer.js"></script>
	<script>
		$(document).ready(function(){
			$("#runNum").numeral(4);
		});
		var urls = <?php echo json_encode(require_once ('url.php')); ?>;
	</script>
	<link rel=stylesheet type="text/css" href="css/testServer.css">
	<title>GIS服务器压力测试</title>
</head>

<body class="main_body" >

	<div id="modelclick" class="main_div" title="GIS服务器压力测试" style="border:1px" >
	
		<div class="title_div">
			<span class="title">GIS服务器压力测试</span>
		</div>
		
		<div>
			<input id="runNum" class="inputText" type="text" value="请输入程序运行次数"  onclick="javascript:if(this.value=='请输入程序运行次数'){ this.value=''};" onblur="javascript:if(this.value==''){ this.value='请输入程序运行次数'};" />
		</div>
		
		<input type="button"  id="testServer" value="Start!" />
		
		<span id="timer"></span>

		<textarea id="mailBody" rows=5 value="请输入邮件正文" readonly="readonly"></textarea>
		
		

		<div class="showReturn">
			<div class="showTag">发送状态: </div>
			<div class="showInfo"></div>
		</div>
	</div>
</body>
</html>
