<?php
	
	$dbType = 'pgsql'; //'pgsql/mysql'

	$host = '192.168.1.164';
	$userName = 'root';
	$passWord = '';
	$db_name = 'mqs_wx';
	$tableNameStr = '"mqs_layer"';
	$tableName = 'mqs_layer';
	
	$path = "sql/{$tableName}.sql"; // 日志路径
	
	$selectCol = '"name","cellid","lac","angle","lon","lat","centerlon","centerlat","target","geom_data"';
	
	if($dbType == 'pgsql'){
		$conn_string = "host={$host} port=5432 dbname={$db_name} user=postgres password=";
		$dbconn4 = pg_connect($conn_string) or die ('connection failed');
		$result = pg_query($dbconn4,"SELECT {$selectCol} FROM {$tableName}");

		$fp = fopen($path, "a");
		
		while ($row = pg_fetch_object($result)) {
			$rowString = "INSERT INTO {$tableNameStr} ({$selectCol}) VALUES ('{$row->name}', {$row->cellid}, {$row->lac}, '{$row->angle}', {$row->lon}, {$row->lat}, {$row->centerlon}, {$row->centerlat}, {$row->target}, '{$row->geom_data}');\r\n";
			fwrite($fp, $rowString);
		}
	fclose($fp);
		
	}else{
		$con = mysql_connect($host,$userName,$passWord);
		if (!$con)
			die('Could not connect: ' . mysql_error());
			
		mysql_query("set character set 'utf8'");
		mysql_query("set names 'utf8'");
		
		$dbCon=mysql_select_db($db_name,$con); 
	
	if(!$dbCon) 
		die('Could not find db');
	
	$result=mysql_query("SELECT * From $tableName");
	
	$fp = fopen("{$tableName}.sql", "a");
	while ($row = mysql_fetch_object($result))
	{
		$rowString = "INSERT INTO `{$tableName}` (cell_name,lac,cellId,lng,lat,angle,type) VALUES ('{$row->cell_name}', {$row->lac}, {$row->cellId}, '{$row->lng}', '{$row->lat}', {$row->angle}, {$row->type});";
		$actionInfo = "{$rowString}\r\n";
        fwrite($fp, $actionInfo);
	}
	fclose($fp);
	
	mysql_close($con);

}
	echo "OK";
?>