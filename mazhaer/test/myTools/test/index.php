<?php
$fileArray = array();

if($current_dir = opendir('.')){ 	
	$drop = array(".","..","index.php");
	while(($file = readdir($current_dir))){
	if(!in_array($file,$drop) && strpos($file,"."))
			array_push($fileArray,$file);
	 }
}else
	return false;

if(!!$fileArray)
	$music = './' . $fileArray[array_rand($fileArray,1)];
else
	return false;
	
/* header('Content-Type : audio/mpeg');

Accept-Ranges	bytes
Connection	close
Content-Length	7046639
Content-Type	audio/mpeg
Date	Fri, 06 Dec 2013 09:36:15 GMT
Etag	"1e8ff0-6b85ef-4b5b24992b480"
Last-Modified	Wed, 04 Jan 2012 11:40:50 GMT
Server	Apache/2.2.15 (CentOS) */


$file_size = filesize($music);
header('Pragma: public'); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); 
header('Content-Transfer-Encoding: binary'); 
header('Content-Encoding: none'); 
header('Content-Type : audio/mpeg');
header('Content-Disposition: attachment; filename="' . $music . '"'); 
header("Content-length: $file_size"); 

echo file_get_contents($music);

/* $fp = fopen($music,"r");
$buffer_size = 1024;
$cur_pos = 0;

echo $music;

while(!feof($fp)&&$file_size-$cur_pos>$buffer_size)
{
$buffer = fread($fp,$buffer_size);
echo $buffer;
$cur_pos += $buffer_size;
}

$buffer = fread($fp,$file_size-$cur_pos);
echo $buffer;
fclose($fp); */




?>