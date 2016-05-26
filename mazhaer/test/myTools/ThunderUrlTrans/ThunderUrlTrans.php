<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../js/zeroclipboard/ZeroClipboard.js"></script>
<script type="text/javascript" src="../js/ThunderUrlTrans/ThunderUrlTrans.js"></script>

<link rel=stylesheet type="text/css" href="../css/ThunderUrlTrans.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Translate</title>

<link rel="shortcut icon" type="image/x-icon" href="../resource/lc.ico" />

</head>

<body id="main_body">

<div id="main_div">

	<input id="refresh" type="image" title="点击刷新" onClick="javascript:reload();" src="../resource/refresh.png" />
	
	<div id="title_div">
		<input id="lcImage" type="image" src="../resource/lc.png"  />
		<span id="title">Thunder URL Translate</span>
	</div>


		<form action="ThunderUrlTrans.php" method="post" name="thunderForm">
		
			<input id="startURL" name="startURL" class="image-sprites" type="text" value="请粘贴需要转换的地址"  onclick="javascript:if(this.value=='请粘贴需要转换的地址'){ this.value=''};" onblur="javascript:if(this.value==''){ this.value='请粘贴需要转换的地址'};"/></br>
			
			<input type="image" id="submitUrl" src="../resource/trans.png" title="点击转换" onClick="javascript:fsubmit(document.thunderForm);" />
			
		</form>


<?php

$newUrl = null;
$error = null;

if(isset($_POST['startURL']))
{ 
	$rePlace = array(
		'%3a'=>':',
		'%2f'=>'/',
		'%3d'=>'=',
		'%2b'=>'+',
	);
	$thunder = "thunder";
  	$oldUrl = $_POST['startURL'];
	$thunderStartNum = stripos( $oldUrl , $thunder ) ;
	
	if( $thunderStartNum !== false )
	{
		$cutThunderStr = substr( $oldUrl , $thunderStartNum );	
		$newUrl = strReplace($rePlace,$cutThunderStr);
	}else{
		$error = "请输入正确的地址！";
	}
}

function strReplace($rePlaceArray,$sourceStr)
{
	foreach($rePlaceArray as $oldStr=>$newStr)
	{
		$sourceStr = str_ireplace($oldStr,$newStr,$sourceStr);
	}
	return $sourceStr;
}

?>

	<input id="transURL" type="text" class="image-sprites" disabled="desabled"  value="<?php if($newUrl != null){ echo $newUrl;}else if($error!= null){ echo $error; }else{ echo "等待转换...";} ?>" />
	<input id="btnCopy" type="image" title="点击复制" src="../resource/thunder.png" onClick = "javascript:copyInit();"  />

</div>

</body>
</html>