<?php
require('conn.php');
$sql="select * from info";
$stmk=$pdo->query($sql);
$row=$stmk->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>公司简介</title>
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
        <li class="mtxt">公司简介</li>
        <li class="ftxt"><?php echo $row['title'];?></li>
        <i></i>
      </ul>
    </div>
  </div>

</div>



<div id="containner">
  <div class="wrap">
    <div id="about_l">
      <img src="picture/pic_3.jpg">
      <div>
        <h4>International <br>
        wool textile enterprise</h4>
        <h2>TOP10</h2>
        <h3>深圳</h3>
        <h5>毛纺企业10强</h5>
      </div>
    </div>
    
    
    <div id="about_r">
    <h2>SINCE 2000</h2>
    <div><h4>深圳金帆纺织</h4>
Shenzhen huayue textile co., LTD</div>
    <span><?php echo $row["content"];?>&nbsp;&nbsp;</span>
    </div>
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