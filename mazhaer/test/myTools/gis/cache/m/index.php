<?php
 for($i=1;$i<=20;$i++){
	if(!file_exists($i))
		mkdir($i,0777);
}

$current_dir = opendir('.');    //opendir()����һ��Ŀ¼���,ʧ�ܷ���false
                while(($file = readdir($current_dir)) !== false) {    //readdir()���ش�Ŀ¼����е�һ����Ŀ
                         $array = explode('_',$file) ;
						 if(isset($array[1])){
							$newPath = $array[1].'/'.$file;
							$flag = rename($file,$newPath);
							echo $flag;
						}
                 }

?>