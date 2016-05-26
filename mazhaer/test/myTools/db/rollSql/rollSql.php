<?php
$startTime = date('Y-m-d H:i:s');
echo $startTime."</br>";
$i = 1200000;
$k = 500;
$sqlString ="";
$path = 'sql/static_information.sql'; // 日志路径
$fp = fopen($path, "a");
for($i;$i<1300000;$i++)
{
	$j = $i;
	$sqlString = "INSERT INTO `static_information` VALUES ('".$k."', '2012-12-14 09:47:27', null, '中国移动', 'ZTE', 'ZTE U970', '2.41000', 'ARMv7 Processor rev 0 (v7l)', '1200000', '755736576', '4.0.3', '46000179".$j."', '862067010000000', 'unknown', '2013-03-05 16:30:09', '290', '13', '127', null, '1369991628.19', null, null, '2013-05-31 17:13:48');";
	fwrite($fp, $sqlString."\r\n");
	$k++;
	
}
fclose($fp);	
$endTime = date('Y-m-d H:i:s');
echo $endTime;
