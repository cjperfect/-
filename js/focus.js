window.onload=function(){
 	var banner=document.getElementById('banner');
	var ol=banner.getElementsByTagName('ol')[0];
	var ul=banner.getElementsByTagName('ul')[0];
	var ulli=ul.getElementsByTagName('li');
	var str="";
	for(var i=0; i<ulli.length; i++){
		str+="<li><a href='javascript:;'></a></li>";
		}
	ol.innerHTML=str;
	
	var olli=ol.getElementsByTagName('li');
	olli[0].className='active';
	for(var i=0; i<olli.length; i++){
		olli[i].index=i;
		olli[i].onmouseover=function(){
			for(var i=0;i<olli.length; i++){
				olli[i].className='';
				ulli[i].style.display='none';
				}
			this.className='active';
			ulli[this.index].style.display='block'
			}
		}
		
}
