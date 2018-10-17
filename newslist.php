<?php
require('conn.php');
require('function.php');
require('webconfig.php');
if(isset($_GET['typeid'])){
	$typeid=$_GET['typeid'];
	$sql="select * from news where typeid={$typeid}";
	$stmt=$pdo->query($sql);
	$dataTotal=$stmt->rowCount();
	if($dataTotal==0){
		die('没有数据');
	}
}
if(isset($_GET['detailid'])){
	$typeid=$_GET['detailid'];
	$sql="select * from news where detailid={$detailid}";
	$stmt=$pdo->query($sql);
	$dataTotal=$stmt->rowCount();
	if($dataTotal==0){
		die('没有数据');
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻列表</title>
<link rel="stylesheet" href="css/info.css">
<script src="js/jquery-1.11.0.js"></script>
<script src="js/nav.js"></script>
<style>
#header{width:100%; height:400px;background:url(images/n_banner1.jpg) no-repeat center center; }
.main_left .path{margin-bottom:30px;}
.main_left .list li{clear:both;}
.main_left .list li .img{float:left;}
.main_left .list li .img img{width:100px;height: 100px;}
.main_left .list li .box{height:100px;padding:10px 20px 10px 20px; float: left;line-height: 2;}
.main_left .list li .box a{font-size:14px; color:black;}
.main_left .list li .box .tag:hover{color:red;}
.main_left .list li .box p{font-size:12px; color:#999;}
.main_left .list ol{clear:both; width: 90%; margin:10px auto; text-align: center;}
.main_left .list ol a,.main_left .list ol span{display:inline-block; height: 30px; margin-left: 8px; color:#ccc; font-size:12px}
.main_left .list ol span{color:black}
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
					if(isset($_GET['typeid'])){
						$sql="select * from newstype where typeid=".$_GET['typeid'];
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						$typename=$row['typename'];
						$typeid=$row['typeid'];
						echo "<a href=newslist.php?typeid={$row['typeid']}>{$row['typename']}</a>";
						}
						
						if(isset($_GET['detailid'])){
						$sql="select * from detailtype,newstype where newstype.typeid=detailtype.typeid and detailid=".$_GET['detailid'];
						$stmt=$pdo->query($sql);
						$row=$stmt->fetch(PDO::FETCH_ASSOC);
						$typename=$row['typename'];
						$typeid=$row['typeid'];
						echo "<a href=newslist.php?typeid=".$row["typeid"].">".$row["typename"]."</a>".">>>"."<a href=newslist.php?detailid=".$row["detailid"].">".$row["detailname"]."</a>";
						}
				?>        		
            </div>
            <div class="list">
            	<?php 
				if(isset($_GET['typeid'])){
					$sql="select * from news where typeid=".$_GET['typeid'];
					}
				elseif(isset($_GET['detailid'])){
				$sql="select * from news where detailid=".$_GET['detailid'];
				}
				$stmt=$pdo->query($sql);
				$dataTotal=$stmt->rowCount();
				$pageSize=6;
				if(isset($_GET['pageNow'])){
					$pageNow=$_GET['pageNow'];
				}else{
					$pageNow=1;
				}
				$dataStart=($pageNow-1)*$pageSize;
				$pageTotal=ceil($dataTotal/$pageSize);
				
				if(isset($_GET['typeid'])){
				$sql="select * from news where typeid=".$_GET['typeid']." limit $dataStart,$pageSize";
				}
				elseif(isset($_GET['detailid'])){
					$sql="select * from news where detailid=".$_GET['detailid']." limit $dataStart,$pageSize";
				}
				else{
					$sql="select * from news limit $dataStart,$pageSize";
				}
				$stmk=$pdo->query($sql);	
				?>
				<ul>
					<?php while($re=$stmk->fetch(PDO::FETCH_ASSOC)){?>
						<li>
							<div class="img"><img src="<?php echo $re['picurl']?>"/></div>
							<div class="box">
								<?php
								if(isset($_GET['detailid'])){			
								$sql="select * from detailtype where detailid={$detailid}";								
								}else{
								$sql="select * from detailtype where detailid={$re['detailid']}";								
									}
								$stmd=$pdo->query($sql);
								$rp=$stmd->fetch(PDO::FETCH_ASSOC);
								echo "<a href=newslist.php?detailid={$rp['detailid']} class='tag'>[ {$rp['detailname']} ]</a>";
								?>
								 <a href="newsview.php?id=<?php echo $re['id']?>"><?php echo getstr1($re['title'],30)?></a>
								<p><?php echo getstr1($re['content'],60)?></p>
							</div>
						</li>
					<?php }?>
				</ul>
				<ol>
					<?php
					$upPage=$pageNow-4;
					$downPage=$pageNow+5;
					if($upPage>$pageTotal-9){
						$upPage=$pageTotal-9;
					}
					if($upPage<1){
						$upPage=1;
					}
					if($downPage<10){
						$downPage=10;
					}
					if($downPage>$pageTotal){
						$downPage=$pageTotal;
					}
					if($pageNow>1){
					$prePage=$pageNow-1;
					}else{
					$prePage=$pageNow;
						}		
					
					if($pageNow<$pageTotal){
					$nextPage=$pageNow+1;
					}else{
					$nextPage=$pageNow;
						}
					if(isset($_GET['detailid'])){
					if($dataTotal>$pageSize){
					echo "<a href=newslist.php?pageNow=1&detailid={$detailid}>首页</a>";
					echo "<a href=newslist.php?pageNow={$prePage}&detailid={$detailid}>上一页</a>";
					for($i=$upPage;$i<=$downPage; $i++){
						if($i==$pageNow){
							echo "<span>$i</span>";
						}else{
						echo "<a href=newslist.php?pageNow={$i}&detailid={$detailid}>$i</a>";
						}
					}
					echo "<a href=newslist.php?pageNow={$nextPage}&detailid={$detailid}>下一页</a>";
					echo "<a href=newslist.php?pageNow={$pageTotal}&detailid={$detailid}>尾页</a>";
						}else{
							echo "";
						}
					}else{
					if($dataTotal>$pageSize){
					echo "<a href=newslist.php?pageNow=1&typeid={$typeid}>首页</a>";
					echo "<a href=newslist.php?pageNow={$prePage}&typeid={$typeid}>上一页</a>";
					for($i=$upPage;$i<=$downPage; $i++){
						if($i==$pageNow){
							echo "<span>$i</span>";
						}else{
						echo "<a href=newslist.php?pageNow={$i}&typeid={$typeid}>$i</a>";
						}
					}
					echo "<a href=newslist.php?pageNow={$nextPage}&typeid={$typeid}>下一页</a>";
					echo "<a href=newslist.php?pageNow={$pageTotal}&typeid={$typeid}>尾页</a>";
						}else{
							echo "";
						}
					}
					?>
				</ol>
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