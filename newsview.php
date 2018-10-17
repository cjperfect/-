<?php
require('conn.php');
require('function.php');
require('webconfig.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	}
$sql="update news set hit=hit+1 where id=$id";
$pdo->query($sql);
$sql="select * from news,newstype,detailtype where news.typeid=newstype.typeid and detailtype.detailid=news.detailid and id={$id}";
$stmk=$pdo->query($sql);
$row=$stmk->fetch(PDO::FETCH_ASSOC);
$typeid=$row['typeid'];
$typename=$row['typename'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="css/info.css">
<script src="js/jquery-1.11.0.js"></script>
<script src="js/nav.js"></script>
<style>
#header{width:100%; height:400px;background:url(images/n_banner1.jpg) no-repeat center center; }
</style>
</head>

<body>
<div id="header">
	<?php require('nav.php')?>
</div>
<div id="container">
	<div class="main">
    	<div class="main_left">
        	<div class="path">
            	<?php 
				
				$sql="select * from newstype where typeid={$row['typeid']}";
				$stmb=$pdo->query($sql);
				$rp=$stmb->fetch(PDO::FETCH_ASSOC);
				echo "<a href=newslist.php?typeid={$row['typeid']}>{$rp['typename']}</a>";
				if(isset($_GET['id'])){
					$id=$_GET['id'];
					$sql="select * from news where id={$id}";
					$stmf=$pdo->query($sql);
					$row=$stmf->fetch(PDO::FETCH_ASSOC);
					$sql="select * from detailtype where detailid={$row['detailid']}";
					$stml=$pdo->query($sql);
					$v=$stml->fetch(PDO::FETCH_ASSOC);
					echo "&gt;&gt;"."<a href=newslist.php?detailid={$v['detailid']}>{$v['detailname']}</a>";
					}
				?>
            </div>
            <div class="content">
            	<h2><?php echo getstr1($row['title'],35)?></h2>
                <p><?php echo "发布时间 : ".$row['fdate']."&nbsp;&nbsp;阅读量 : ".$row['hit']?></p>
                <div style="width:100%"><?php echo $row['content']?></div>
                <?php
                	$sql="select * from news where id<$id order by id desc limit 0,1";
					$stmd=$pdo->query($sql);
					$ra=$stmd->fetch(PDO::FETCH_ASSOC);
					if($id<=1){
						echo "<span>上一篇 : 已经没有了</span>";
						}else{
						echo "<a href=newsview.php?id={$ra['id']}>上一篇 : ".getstr1($ra['title'],30)."</a>";
							}
					$sql="select * from news";
					$stme=$pdo->query($sql);
					$datetotal=$stme->rowCount();
					$sql="select * from news where id>$id order by id asc limit 0,1";
					$stmf=$pdo->query($sql);
					$rb=$stmf->fetch(PDO::FETCH_ASSOC);
					if($id>$datetotal){
						echo "<span>下一篇 : 已经没有了</span>";
						}else{
						echo "<a href=newsview.php?id={$rb['id']}>上一篇 : ".getstr1($rb['title'],20)."</a>";
							}
				?>
            </div>
        </div>
        <?php require('sidebar.php')?>
    </div>
</div>
<?php require('footer.php')?>
</body>
</html>
<script>
//禁止横向的滚动条
document.documentElement.style.overflowX="hidden";
</script>