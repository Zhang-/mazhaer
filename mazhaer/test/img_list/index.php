<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>马扎网|马扎音乐 mazhaer.com</title>
<link rel="shortcut icon" type="image/x-icon" href="http://mazhaer.com/mazhaer-logo.ico">
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
</style>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/notification.js"></script>
<script type="text/javascript" src="js/bigimg.js"></script>
<script type="text/javascript" src="js/jquery.lazyload.min.js" ></script>
<script type="text/javascript" src="js/blocksit.min.js"></script>
<script type="text/javascript" src="js/pubu.js"></script>

<link rel="stylesheet" href="css/bigimg.css" type="text/css"/>
<link rel="stylesheet" href="css/pubu.css" type="text/css" media='screen'/>

</head>
<body>

<div style="color:green;text-align:center;font-size:25px;margin-top:30px;">音乐心情每一天~</div>
</br>

<!--瀑布流  start-->
<div id="wrapper">
	<div id="container" style="width:995px;">
		<?php
			for($i=1; $i<=40; $i++)
			{
		?>
			<div class="grid">
				<div class="imgholder">
					<img class="lazy thumb_photo" title="<?php echo $i; ?>" src="images/pixel.gif" data-original="images/<?php echo $i; ?>.jpg" width="225" />
				</div>
			</div>
		<?php
			}
		?>
	</div>
</div>

<!--瀑布流 end-->
<div class="clear"></div>
<!--<div class="load_more">
	<span class="load_more_text">加载更多...</span>
</div>-->


<!--大图弹出层 start-->
<div class="container">
	<div class="close_div">
		<img src="images/closelabel.gif" class="close_pop" title="关闭" alt="关闭" style="cursor:pointer">　
	</div>
	<!-- 代码 开始 -->
	<div class="content">
		<span style="display:none"><img src="images/load.gif" /></span>
		<div class="left"></div>
		<div class="right"></div>
		<?php
			for($i=1; $i<=40; $i++)
			{
		?>
			<img class="img" src="images/large/<?php echo $i; ?>.jpg">
		<?php
			}
		?>
	</div>
	<div class="bottom" style="text-align:center; font:bold 18px 'MicroSoft YaHei';"><br />共 <span id="img_count">x</span> 张 / 第 <span id="xz">x</span> 张</div>
	<!-- 代码 结束 -->
</div><!--end-->

<script type="text/javascript">
$(document).ready(function(){

	var count = 40;
	// 点击加载更多
	$('.load_more').click(function(){
		var html = "";
		var img = '';
		for(var i = count; i < count+40; i++){
			var n = Math.round(Math.random(1)*40);
			var src = 'images/'+n+'.jpg';
			html = html + "<div class='grid'>"+
				"<div class='imgholder'>"+
				"<img class='lazy thumb_photo' title='"+i+"' src='images/pixel.gif' data-original='"+src+"' width='225' onclick='seeBig(this)'/>"+
				"</div>"+
				"</div>";
			img = img + "<img class='img' src='"+src+"'>";
		}
		count = count + 40;
		$('#container').append(html);
		$('.content').append(img);
		$('#container').BlocksIt({
			numOfCol:4,  //每行显示数
			offsetX: 5,  //图片的间隔
			offsetY: 5   //图片的间隔
		});
		$("img.lazy").lazyload();
	});

});
</script>
<div style="text-align:center;margin:50px 0; font:bold 18px 'MicroSoft YaHei';">
<p>From : <a href="http://mazhaer.com">mazhaer.com</a></p>
</div>
</body>
</html>