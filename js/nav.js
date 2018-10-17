$(function(){
	$('#nav .list li').hover(function(){
		var x=$(this).index('li');
		if(x>0){
		var left=x*100.8+20;
		$('#nav .line').stop().animate({
			'left':left+'px',
			},500)
		}
		},function(){
		$('#nav .line').stop().animate({
			'left':'1%'
			},500)
			})
	})
