
	var product=document.getElementById('product');
	var ul=product.getElementsByTagName('ul')[0];
	var li=ul.getElementsByTagName('li');
	var speed=5;
	var timer=null;
	ul.innerHTML+=ul.innerHTML;
	ul.style.width=li[0].offsetWidth*li.length+'px';
	function startMove(){
		if(ul.offsetLeft>0){
			ul.style.left=-ul.offsetWidth/2+'px';
			}
		if(-ul.offsetLeft>ul.offsetWidth/2){
			ul.style.left=0;
			}
		ul.style.left=ul.offsetLeft+speed+'px';
			}
	timer=setInterval(startMove,30)
		
	var oLeft=product.getElementsByClassName('btnleft')[0];
	var oRight=product.getElementsByClassName('btnright')[0];
	oLeft.onclick=function(){
		speed=-5;
		}
	oRight.onclick=function(){
		speed=5;
		}
	ul.onmouseover=function(){
		clearInterval(timer)
		}
	ul.onmouseout=function(){
		timer=setInterval(startMove,30)
		}

