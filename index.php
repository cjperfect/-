<?php 
require('conn.php');
require('function.php');
require('webconfig.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>陈江测试网站</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<script src="js/jquery-1.11.0.js"></script>
<script src="js/nav.js"></script>
</head>

<body style="background:url(images/bg.jpg) no-repeat 50% -300px;">
	<?php require('nav.php')?>
    <div id="banner">
        <div class="bj">
        	<ul>
            	<?php
                	$sql="select * from focus";
					$stmt=$pdo->query($sql);
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
    			  	<li><a href="" style="background:url(<?php echo $row["picurl"] ?>) 50% 50% no-repeat"></a></li>
                <?php }?>
            </ul>
            <ol></ol>
        </div>
      <div class="xc">
            <span>致力于打造国际纺织材料品牌前列</span>
            <div class="btxt"><b>精益求精</b> · 做深圳最好纺织</div>
            <i>STRIVE FOR THE BEST TEXTILE</i> 
        </div>
  <a href="javascript:;" class="prev"><img src="images/bnt_left.png" /></a> 
  <a href="javascript:;" class="next"><img src="images/bnt_right.png" /></a>
     </div>
    <script src="js/focus.js"></script>
    <div id="info">
    	<div class="main">
        	<div class="main_left">
            	<h3>关于我们</h3>
                <?php
                	$sql="select * from info where id=1";
					$stmt=$pdo->query($sql);
					$row=$stmt->fetch(PDO::FETCH_ASSOC);
					echo "<h5>{$row['title']}</h5>";
					echo "<p>{$row['content']}</p>";
				?>
            </div>
            <div class="main_right"></div>
        </div>
    </div>
    <div id="product">
    	<div class="wrap">
        <h3>公司产品</h3>
        <div class="box">
        <ul>
        	<?php
            	$sql="select * from productype";
				$stmt=$pdo->query($sql);
				$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
			?>
            <?php foreach($rows as $rs){?>
            <li>
                <a href="javascript:;">
                	<div class="img"><img src="<?php echo $rs['typepic']?>"></div>
                    <div class="txt">
                    	<h5><?php echo $rs['typename']?></h5>
                        <b></b>
                        <i><?php echo $rs['ename']?></i>
                    </div>
                </a>
            </li>
            <?php }?>
            </ul>
           </div>
            <a href="javascript:;" class="btnleft"></a>
            <a href="javascript:;" class="btnright"></a>
        </div>
    </div>
   <script src="js/move.js"></script>
   <div id="process">
   		<div class="main">
        <h3>制造工艺/生产车间</h3>
        	<div class="pic"><img src="images/a1.jpg"></div>
            <div class="content">
            	<h5>金帆制造工艺</h5>
                <span>
                	<?php
                    	$sql="select * from  info where id=1";
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						echo getstr1($row["content"],80);
					?>
                </span>
            </div>
        	<div class="pic"><img src="images/a2.jpg"></div>
            <div class="content">
            	<h5>金帆制造工艺</h5>
                <span>
                	<?php
                    	$sql="select * from  info where id=1";
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						 echo getstr1($row["content"],80);
					?>
                </span>
            </div>
            <div class="content">
            	<h5>金帆制造工艺</h5>
                <span>
                	<?php
                    	$sql="select * from  info where id=1";
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						 echo getstr1($row["content"],80);
					?>
                </span>
            </div>
            <div class="pic"><img src="images/a3.jpg"></div>
            <div class="content">
            	<h5>金帆制造工艺</h5>
                <p>
                	<?php
                    	$sql="select * from  info where id=1";
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						echo getstr1($row["content"],80);
					?>
                </p>
            </div>
            <div class="pic"><img src="images/a4.jpg"></div>
        </div>
   </div>
  	<div id="news">
    	<div class="wrap">
        <h3>新闻资讯 </h3>
        	<div class="wrap_left">
            	<div class="img"><img src="images/b7.jpg"></div>
                <div class="news_img_txt">
                	<div class="time">
					<?php 
						$sql="select * from news order by fdate limit 0,1";
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
					?>
                    	<span><?php echo date('d',strtotime($row['fdate']))?></span>
                        <p><?php echo date('Y-m',strtotime($row['fdate']))?></p>
                        </div>
                        
                        <div class="info" style="padding-left:20px">
                          <a href="newsview.php?id=<?php echo $row['id']?>"><?php echo getstr1($row['title'],32)?></a>
                        </div>
                        <div class="content">
                        <?php echo getstr1($row['content'],40) ?>
                        </div>
                </div>
            </div>
            <div class="wrap_right">
            	<ul>
                	<?php
        			  $sql="select * from news order by fdate desc limit 0,6";
					  $stmt=$pdo->query($sql);
					  $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
					?>
                    <?php foreach($rows as $rs){?>
                    <li>
                        <div class="time">
                            <span><?php echo date('d',strtotime($rs['fdate']))?></span>
                            <p><?php echo date('Y-m',strtotime($rs['fdate']))?></p>
                        </div>
                        <div class="info">
                          <a href="newsview.php?id=<?php echo $rs['id']?>"><?php echo getstr1($rs['title'],25)?></a>
                          <p><?php echo getstr1(ClearHTML($rs['content']),40)?></p>
                        </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer">
    	<div class="main">
        	<div class="list">
            <h4>关于我们</h4>
               	<ul>
            	<?php
                $sql="select * from info";
				$stmt=$pdo->query($sql);
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
                <li><a href="infoview.php?id<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></li>
                <?php }?>
            </ul>

            </div>
            <div class="list">
                <h4>公司产品</h4>
                <ul>
                  <?php 
                    $sql="select * from `productype`";
                    $stmt=$pdo->query($sql);
                    while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <li><a href="productlist.php?typeid=<?php echo $rs["typeid"] ?>" title=""><?php echo $rs["typename"] ?></a></li>
                  <?php }?>
                </ul>
                </div>
            <div class="list">
                <h4>新闻动态</h4>
                <ul>
                  <?php 
                    $sql="select * from `detailtype` where typeid=3";
                    $stmt=$pdo->query($sql);
                    while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                    <li><a href="newslist.php?detailid=<?php echo $rs["detailid"] ?>" title=""><?php echo $rs["detailname"] ?></a></		li>
                  <?php }?>
                </ul>
            </div>
            <div class="list big">
            	<h4>联系我们</h4>
                <div class="tel">
                	<span>全国统一热线 : </span>
                    <b><?php echo $cfg_tel ?></b>
                </div>
                <div class="message"><?php echo $cfg_weburl ?></div>
                <div class="message">公司邮箱：<?php echo $cfg_email ?></div>
                <div class="message">公司地址：<?php echo $cfg_address ?></div>
            </div>
            <div class="code">
            <div><img src="images/pcewm.png"></div>
            <div><img src="images/wxewm.jpg"></div>
            </div>
            <div class="line"></div>
        </div>
        
                <div class="brand">
                                <div>版权所有&copy;<?php echo $cfg_webname ?><script>var myDate = new Date();var year = myDate.getFullYear();document.write(year);</script>&nbsp;&nbsp;&nbsp;本站由<?php echo $cfg_author ?>开发 
                                </div>
                                <div> 粤ICP备1548688号-1&nbsp;&nbsp;<a href=""> &nbsp;联系我们&nbsp; </a> &nbsp;|&nbsp; <a href=""> &nbsp;关于我们&nbsp; </a>&nbsp; |&nbsp; <a href=""> &nbsp;加入我们 &nbsp;</a></div>
                            </div>  
                              
            </div>
</body>
<script>
//禁止横向的滚动条
document.documentElement.style.overflowX="hidden";
</script>
</html>