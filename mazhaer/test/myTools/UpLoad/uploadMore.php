<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.111cn.net1999/xhtml">
	<head>
		<meta content="text/html; charset=utf8" http-equiv="content-type" />
		<title>多个文件上传</title>
		<script type="text/javascript">
			function addinput()//增加input节点
			{
				var input=document.createElement('input');//创建一个input节点
				var br=document.createElement('br');//创建一个br节点
				input.setAttribute('type','file');// 设置input节点type属性为file
				input.setAttribute('name','pic[]');//设置input节点 pic[]，以 数组的方式传递给服务器端
				document.upload.appendChild(br);//把节点添加到 upload 表单中
				document.upload.appendChild(input);
			}
		</script>
	</head>
	<?php
		ini_set('upload_max_filesize','1024M');  //允许上传文件的大小
		ini_set('post_max_size','1024M');  //允许占用内存大小
		ini_set('memory_limit','1024M');  //允许占用内存大小
		set_time_limit(0);  //程序运行时间不限制
		
		//获取文件目录列表,该方法返回数组
		function getDir($dir) 
		{
			$dirArray[]=NULL;
			if (false != ($handle = opendir ( $dir ))) {
				$i=0;
				while ( false !== ($file = readdir ( $handle )) ) {
					//去掉"“.”、“..”以及带“.xxx”后缀的文件
					if ($file != "." && $file != ".."&&!strpos($file,".")) {
						$dirArray[$i]=$file;
						$i++;
					}
				}
				//关闭句柄
				closedir ( $handle );
			}
			return $dirArray;
		}
		
		
	//获取文件列表
		function getFile($dir) 
		{
			$fileArray[]=NULL;
			if (false != ($handle = opendir ( $dir )))
			{
				$i=0;
				while ( false !== ($file = readdir ( $handle )) )
				{
					//去掉"“.”、“..”以及带“.xxx”后缀的文件
					if ($file != "." && $file != ".."&&strpos($file,"."))
					{
						$fileArray[$i]=$file;
						if($i==500)
						{
							break;
						}
						$i++;
					}
				}
			//关闭句柄
				closedir ( $handle );
			}
			return $fileArray;
		}
		
		if(isset($_POST['sub']))
		{
			$files=$_FILES['pic'];
			//print_r($files);exit;
			$fnum=count($files['name']); //取得上传文件个数
			$myFiles = array();
			$myFiles = getFile('upload');
			for($i=0;$i<$fnum;$i++)
			{
				$fileName = $files['name'][$i];
				if($fileName!=''&&is_uploaded_file($files['tmp_name'][$i]))
				{
					if(!in_array($fileName,$myFiles))
					{
						move_uploaded_file($files['tmp_name'][$i],"upload/".$files['name'][$i]);
						echo '<br/>文件 '.$files['name'][$i].' 上传成功！';
					}else{
						echo '<br/>文件 '.$files['name'][$i].' 已存在！';
					}
				}else{
					echo '<br/>未选择文件！';
			   } 
			}
		}
	?>
	<body>
		<form name="upload" method="post" action="" enctype="multipart/form-data" >
			<input type="file" name="pic[]" />
			<input type="submit" name="sub" value="上传"/>
		</form>
		<input type="button" onclick="javascript:addinput();" value="再上传一个" />
	</body>
</html>