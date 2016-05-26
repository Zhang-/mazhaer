<?php 
if(!defined('MAIL_STRING')) exit;
/**
 * 发送邮件函数
 * @param 发件人信息 $send_info
 * array("Host"=>"127.0.0.1","userNmae"=>"rfh2fg2nc@itylwabc.com","pwd"=>"4574f56b","displayName"=>"周日粉")
 * @param 收件人地址 $Addressee
 * array("88ddqq@163.com","331048265@qq.com")
 * @param 邮件标题 $title
 * @param 发送内容 $body
 */
set_time_limit(0);
include_once '/libEmail/phpmailer.php';
include_once '/libEmail/pop3.php';
include_once '/libEmail/smtp.php';

function send_email_function($Addressee=array(),$title,$body){
	set_time_limit(0);
	//print_r($send_info);exit;
	/*echo "{$send_info['userNmae']}:{$Addressee[0]},".count($Addressee)."<br>";
	return true;*/
	
	$send_info = require ('config.php');
	$flag = array();
	
	$mail = new mailer_phpmailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;
	$mail->CharSet = "utf-8";
	
	$mail->Host = $send_info["Host"];
	$mail->Port = 25;
	$mail->Username = $send_info["userNmae"];
	$mail->Password = $send_info["pwd"];
	$mail->SetFrom($send_info["userNmae"], $send_info["displayName"]);
	
	$mail->Subject = $title;
	$mail->MsgHTML($body);
	
	foreach ($Addressee as $key => $value) {
		if(empty($key))
			$mail->AddAddress($value, null);//增加收件人
		else 
			$mail->AddBCC($value, null);//加密的收件人
		$flag[$value] = ($mail->Send() === true)?true:false;
	}
	return $flag;
}
/*
$send_info = array("Host"=>"127.0.0.1","userNmae"=>"123234@kciwo93834.com","pwd"=>"123456","displayName"=>"周日粉");
//$Addressee = array("88ddqq@163.com","331048265@qq.com");
$Addressee = array("331048265@qq.com");
echo send_email_function($send_info,$Addressee,"邮件标题","邮件内容");
*/
	
/**
 * 将字符串保存到文件里(会删除原来的数据)
 * @param String $str 保存的字符
 * @param String $filename 文件名
 */
function saveFile($str, $filename) {
	$fp = fopen ( $filename, "w+" );
	if ($fp == NULL)
		echo "文件处理出错";
	
	fwrite ( $fp, $str ); //写入2个字符 
	fclose ( $fp );
	return true;
}

/**
 * 读取文件所有内容
 * @param String $filename 文件名
 */
function readFileContent($filename){
//	$fn = "2.dat";
	$rh = fopen ( $filename, "rb" );
	$pb = fread ( $rh, filesize ( $filename ) );
	fclose ( $rh );
	return $pb;
}

function sendMe($address, $title, $body){
	
	$address = str_replace('；',';',$address);
	$address = explode(';',$address);
	
	$flag = send_email_function ($address, $title, $body );
	return $flag;
}
?>