<?php 

$path="1.vcf";//路径
	 $d=fopen($path,"r");
	 $request='';
	$request=fread($d,filesize("1.vcf"));
	//print($request);
	
	$vcfArray = array();
	$end = '';
	$str = 'END:VCARD';
	$i = 1;
		$vcfArray = explode($str,$request);
		
		foreach($vcfArray as $val)
		{
			$i++;
			$end = $val.$str;
			$path='temp'.$i.'.vcf';//路径
			$fp=fopen($path,"a");
			fwrite($fp,$end);
			fclose($fp);
		}
	

		echo "success!!";
 
?>