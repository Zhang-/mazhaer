$(function(){
	$('#testServer').click(function(){
		startTime  = new Date().getTime();
		var maxi = $('#runNum').val();
		if(maxi == '请输入程序运行次数'){
			alert('请输入程序运行次数');
			return false;
		}else{
			var i = 1;
			while(i <= maxi){
				for(var s in urls){
					var sNum = parseInt(s)+1;
					 $.ajax({
						type : 'post',
						url : 'getPost.php',
						data :{
							i : i,
							s : sNum,
							url : urls[s]
						},
						success : function(data){
							if(!!data){			
								$('#mailBody').val(data+$('#mailBody').val());
							}else{
								alert('未知错误！');
							}
						}
					}); 
				}
				i++;
			}
		}
	})
})


