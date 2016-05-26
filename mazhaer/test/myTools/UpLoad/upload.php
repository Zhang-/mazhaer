
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>文件上传</title>
</head>

<body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="modelclick" title="上传">
	<form method="post" action="upload.php" enctype="multipart/form-data">
	<h1><p>选择文件：<input class='file' type='file' name="file" /><input type="submit" value="上传" class="subupdate"/></p></h1>
	</form>  
	
<?php
	if(isset($_FILES["file"]))
	{
		
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			$_FILES=null;
		}else{
			echo "上传文件名称: " . $_FILES["file"]["name"] . "<br />";
			echo "文件类型: " . $_FILES["file"]["type"] . "<br />";
			echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";

			if(file_exists("upload/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " already exists. ";
				$_FILES=null;
			}else{
				move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
				echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
				$_FILES=null;
			}
		}
	}
?>

</div>

</body>
</html>