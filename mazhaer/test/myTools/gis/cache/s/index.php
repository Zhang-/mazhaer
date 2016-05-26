<?php
 for($i=1;$i<=20;$i++){
	if(!file_exists($i))
		mkdir($i,0777);
}

$current_dir = opendir('.');    //opendir()返回一个目录句柄,失败返回false
                while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
                         $array = explode('_',$file) ;
						 if(isset($array[1])){
							$newPath = $array[1].'/'.$file;
							$flag = rename($file,$newPath);
							echo $flag;
						}
                 }

?>