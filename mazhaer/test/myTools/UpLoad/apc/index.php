<?php  
   $id = md5(uniqid(rand(), true));  
?>  
<html>  
<head><title>上传进度</title></head>  
<body>  
<script src="js/jquery-1.4.4.min.js" language="javascript"></script>  
  
  
<script language="javascript">  
var proNum=0;  
var loop=0;  
var progressResult;  
function sendURL() {  
            $.ajax({  
                        type : 'GET',  
                        url : "getprogress.php?progress_key=<?php echo $id;?>",  
                        async : true,  
                        cache : false,  
                        dataType : 'json',  
                        data: "progress_key=<?php echo $id;?>",  
                        success : function(e) {  
                                     progressResult = e;  
                                      proNum=parseInt(progressResult);  
                                      document.getElementById("progressinner").style.width = proNum+"%";  
                                      document.getElementById("showNum").innerHTML = proNum+"%";  
                                      if ( proNum < 100){  
                                        setTimeout("getProgress()", 100);  
                                      }   
                                   
                        }  
            });  
    
}  
  
function getProgress(){  
 loop++;  
  
 sendURL();  
}  
var interval;  
function startProgress(){  
    document.getElementById("progressouter").style.display="block";  
   setTimeout("getProgress()", 100);  
}  
</script>  
<iframe id="theframe" name="theframe"   
        src="upload.php?id=<?php echo $id; ?>"   
        style="border: none; height: 100px; width: 400px;" >   
</iframe>  
<br/><br/>  
<div id="progressouter" style="width: 500px; height: 20px; border: 6px solid red; display:none;">  
   <div id="progressinner" style="position: relative; height: 20px; background-color: purple; width: 0%; "></div>  
</div>  
<div id='showNum'></div><br>  
<div id='showNum2'></div>  
</body>  
</html>  