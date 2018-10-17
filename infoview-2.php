<?php
require('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>联系我们</title>

<link rel="stylesheet" href="css/info.css">
<link rel="stylesheet" href="css/css.css">
<script src="js/jquery-1.11.0.js"></script>
<script src="js/nav.js"></script>
<style>
#header{width:100%; height:400px;background:url(images/n_banner1.jpg) no-repeat center center; }
</style>
</head>
<body>
	<div id="header">
<?php require('nav.php')?>  

<div class="infobar">
    <div>
      <ul>
        <li class="etxt">CONTACT US</li>
        <li class="mtxt">联系我们</li>
        <li class="ftxt">深圳金帆纺织有限公司</li>
        <i></i>
      </ul>
    </div>
  </div>
</div>

<div class="contact_n">
  <div class="wrap">
	<dl>
		<dt>
			<img src="images/contact_t_01.png"> 
		</dt>
		<dd>
			<h2>
				公司地址
			</h2>
			<p>
				 深圳市福田区车公庙泰然工贸园212栋802			</p>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="images/contact_t_02.png"> 
		</dt>
		<dd>
			<h2>
				联系方式
			</h2>
			<p>
				咨询热线：086 - 0755-83207510<br>
图文传真：086 - 0755-83207512			</p>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="images/contact_t_03.png"> 
		</dt>
		<dd>
			<h2>
				公司邮箱
			</h2>
			<p>
				业务邮箱：zc413zc@163.com			</p>
		</dd>
	</dl>
	<dl>
		<dt>
			<img src="images/contact_t_04.png"> 
		</dt>
		<dd>
			<h2>
				在线客服
			</h2>
			<p>
				
咨询QQ：156417171			</p>
		</dd>
	</dl>
    <div class="clr"></div>
  </div>
</div>




<div id="footer">
  <section class="up">
    <div class="main_box wrap">
      <nav id="fot_nav">
          <a href="" title="">集团简介 </a><i>|</i>
          <a href="" title="">新闻动态</a><i>|</i>
          <a href="" title="">人才战略</a><i>|</i>
          <a href="" title="">联系方式</a>  
      </nav>
    </div>
  </section>

  <section class="un">
    <div class="main_box wrap">
      <mark class="line"></mark>
    ©<script type="text/javascript">var myDate = new Date();var fullyear = myDate.getFullYear();document.write(fullyear);</script>2017  All rights reserved . 深圳市金帆纺织  深ICP备17008443号  技术支持 <a href="http://www.hbxnseo.com/" target="_blank" title="技术支持：星想互联">星想互联</a>

      <aside id="fot_tel">
         <span class="">咨询热线：</span>
         <strong>086 - 0755-83207510</strong>
      </aside>
    </div>
  </section>
  
  <div class="clear"></div>
</div>
</body>
</html>
<script>
//禁止横向的滚动条
document.documentElement.style.overflowX="hidden";
</script>