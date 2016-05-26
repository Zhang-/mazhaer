<?php    
set_time_limit(6000);  
ini_set('upload_max_filesize','2048M');  //允许上传文件的大小
ini_set('memory_limit', '2048M');  //允许占用内存大小
if($_SERVER['REQUEST_METHOD']=='POST') {  
  move_uploaded_file($_FILES["test_file"]["tmp_name"],   
  dirname($_SERVER['SCRIPT_FILENAME'])."/UploadTemp/" . $_FILES["test_file"]["name"]);//UploadTemp文件夹位于此脚本相同目录下  
  echo "<p>上传成功</p>";  
}  
?>  