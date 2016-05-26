//form提交
function fsubmit(obj)
{
	
    obj.submit();
	copyInit();
	
} 

//页面刷新
function reload()
{
	window.location.reload(true);
}

//flash 和 js 实现多浏览器复制
function copyInit()
{
	 ZeroClipboard.setMoviePath("../js/zeroclipboard/ZeroClipboard.swf"); //  重新设置引用SWF文件的路径，默认SWF文件引用句路径是与.html页面放在一个目录下

	 var clip = new ZeroClipboard.Client(); // 新建一个对象
	 var text = document.getElementById('transURL').value;
	 clip.setHandCursor(true); // 设置鼠标样式为手型
	 
	 clip.setText(text); // 设置要复制的文本。

	 //clip.addEventListener("complete", function(client){alert("复制成功！");}); // 绑定事件：当复制完成后，提示复制成功

	 clip.glue("btnCopy"); // 当点击Id为btnCopy这个Dom元素时，会触发复制的方法。注：此方法的位置应放在最后一句。

	 // 避免在更改窗口大小时，出现Flash位置错位问题。所以在改变窗口大小时，最好再重新计算下Flash按钮位置
	 $(window).resize(function(){
	   clip.reposition();
	 }); 
}

/* window.onload=function(){
	copyInit();
} */