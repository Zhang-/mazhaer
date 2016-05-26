
<?php 

if(!!$_POST){


$config = array(
	'lc'=>'~_~',
	//'server0'=>'211.103.112.2', //请求117切片
	//'server0'=>'211.103.112.2', //请求117切片
	'server0'=>'wap.hupu.com/soccer', //请求117切片
	'server1'=>'wap.hupu.com/nba', //请求117切片
);

	$i = $_POST['i'];
	$s = $_POST['s'];
	$param = $_POST['url'];
	
	function getServerMap($serverUrl, $param){
		//$serverUrl="http://{$serverUrl}/location/mapserver/{$param}"; //远程服务器url
		$serverUrl="http://{$serverUrl}"; //远程服务器url
		$tuCurl = curl_init();
		curl_setopt($tuCurl, CURLOPT_URL,$serverUrl);
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($tuCurl, CURLOPT_CONNECTTIMEOUT_MS,3000);  
		$re = curl_exec($tuCurl);
		if($re)
			return $re;
		else
			return false;
	}

		
		$a = rand(0,1);
		$server = $config["server{$a}"]; //首选服务器
		$b = abs($a-1);
		$server1 = $config["server{$b}"]; //备用服务器
		
		$param = $param . "&lc=" . $config['lc'];
		
		$re = getServerMap($server, $param); //获取远程切片
		if($re)
			echo $server . "  第{$i}轮测试,第 {$s} 次请求 : OK \r\n"; //如果第一次可以请求到
		else{
			$re = getServerMap($server1, $param); //第一次请求不到，请求备用服务器
			if($re)
				echo $server1 . "  第{$i}轮测试,第 {$s} 次请求 : OK \r\n";
			else
				echo $server . "  第{$i}轮测试,第 {$s} 次请求 : FALSE \r\n"; //如果都不能获取，返回没有图片
		}

}else{
	return false;
}


?>
