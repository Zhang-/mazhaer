<?php

 echo "当前运行的程序为：";
 echo $_SERVER["PHP_SELF"];
 echo "<br>";
 echo "当前运行脚本所在服务器主机的名称：";
 echo $_SERVER['SERVER_NAME'];
 echo "<br>";
 echo "您的服务器标识的字符串为：";
 echo $_SERVER['SERVER_SOFTWARE'];
 echo "<br>";
 echo "当前请求的Connection状态为：";
 echo $_SERVER['HTTP_CONNECTION'];
 echo "<br>";
 echo "服务器所使用的端口为：";
 echo $_SERVER['SERVER_PORT'];
 echo "<br>";;
 echo "请求页面时通信协议的名称和版本：";
 echo $_SERVER['SERVER_PROTOCOL'];
 echo "<br>";
 echo "访问页面时的请求方法";
 echo $_SERVER['REQUEST_METHOD'];
 echo "<br>";
 echo "查询(query)的字符串(URL中第一个问号?之后的内容)：";
 echo $_SERVER['QUERY_STRING'];
 echo "<br>";
 echo "当前运行脚本所在的文档根目录：";
 echo $_SERVER['DOCUMENT_ROOT'];
 echo "<br>";
 echo "当前请求的Accept:";
 echo $_SERVER['HTTP_ACCEPT'];
 echo "<br>";
 echo "当前请求的Accept_Charset:";
 echo $_SERVER['HTTP_ACCEPT_CHARSET'];
 echo "<br>";
 echo "当前请求的Accept_Encoding:";
 echo $_SERVER['HTTP_ACCEPT_ENCODING'];
 echo "<br>";
 echo "当前请求的Accept_language:";
 echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
 echo "<br>";
 echo "当前请求的Host;";
 echo $_SERVER['HTTP_HOST'];
 echo "<br>";
 echo "当前您的浏览器为：";
 if(strstr($_SERVER['HTTP_USER_AGENT'],"MSIE"))
 echo "Internet Explorer";
 echo "<br>";
 echo "您的IP地址：";
 echo $_SERVER['REMOTE_ADDR'];
 echo "<br>";
 echo "您的用户的主机名：";
 echo $_SERVER["REMOTE_HOST"];
 echo "<br>";
 echo "用户连接到服务器时所使用的端口为:";
 echo $_SERVER['REMOTE_PORT'];
 echo "<br>";
 echo "当前执行脚本的绝对路径名：";
 echo $_SERVER['SCRIPT_FILENAME'];
 echo "<br>";
 echo "包含服务器版本和虚拟主机名的字符串"."：";
echo $_SERVER["SERVER_SIGNATURE"];
echo "<br>";
echo "当前脚本所在文件系统（不是文档根目录）的基本路径"."：";
echo $_SERVER["PATH_TRANSLATED"];
echo "<br>";
echo "包含当前脚本的路径"."：";
echo $_SERVER["SCRIPT_NAME"];
echo "<br>";
echo "访问此页面所需的 URI"."：";
echo $_SERVER["REQUEST_URI"];
echo "<br>";
echo "服务器使用的 CGI 规范的版本：";
echo $_SERVER["GATEWAY_INTERFACE"];
echo "<br>";
?>