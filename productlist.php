<?php
require('conn.php');
require('function.php');
require('webconfig.php');
if(isset($_GET['typeid'])){
	$typeid=$_GET['typeid'];
}
$sql="select * from product where tid={$typeid}";
$stmt=$pdo->query($sql);
$dataTotal=$stmt->rowCount();
if($dataTotal==0){
	die('没有数据');
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
#header{position:relative;width:100%; height:400px;background:url(images/n_banner1.jpg) no-repeat center center; }
#header .productlist{position: absolute; left: 5%; bottom: 3%;}
#header .productlist li{float: left; width: 90px; height: 60px; background: rgba(0,0,0,0.5); text-align: center;line-height: 60px; margin-left: 3px;}
#header .productlist li a{color:white; font-size: 14px;}
#container .main li{position:relative;width:24%; height: 400px; margin-left: 1%; margin-bottom:5%; float: left;}
#container .main li img{width:100%; height: 100%;}
#container .main li .bg{width:100%; height: 100%; position: absolute; left: 0px; top: 0px; text-align: center; line-height: 400px; color: white; background-color: black; opacity: 0; transition: all 1000ms}
#container .main li:hover .bg{opacity: 0.7;}
#container .main li .content{width:100%; text-align: center; line-height: 1.5; color:#333; font-size: 14px;}
.main ol{clear:both; width: 90%; margin:10px auto; text-align: center;}
.main ol a,.main ol span{display:inline-block; height: 30px; margin-left: 8px; color:#999; font-size:12px}
.main ol span{color:black}

</style>
</head>
<?php
$sql="select * from productype";
$sk=$pdo->query($sql);

?>

<body>
<div id="header">
	<?php require('nav.php')?>
	<div class="productlist">
		<ul>
			<?php while($rd=$sk->fetch(PDO::FETCH_ASSOC)){?>
				<li><a href="productlist.php?typeid=<?php echo $rd['typeid']?>"><?php echo $rd['typename']?></a></li>
			<?php }?>
		</ul>
	</div>
</div>
<div id="container">
	<div class="main">
    	<ul>
    		<?php 
    			if(isset($_GET['typeid'])){
    				$typeid=$_GET['typeid'];
    				$sql="select * from product where tid=$typeid";
    			}else{
    				$sql="select * from product where tid=2";
    			}
				$stmt=$pdo->query($sql);
				$dataTotal=$stmt->rowCount();
				$pageSize=8;
				if(isset($_GET['pageNow'])){
					$pageNow=$_GET['pageNow'];
				}else{
					$pageNow=1;
				}
				$pageTotal=ceil($dataTotal/$pageSize);
				$dataStart=($pageNow-1)*$pageSize;
				$sql="select * from product where  tid={$typeid} limit $dataStart,$pageSize";
				$stmi=$pdo->query($sql);
				$rows=$stmi->fetchAll(PDO::FETCH_ASSOC);
				foreach($rows as $rs){
    		?>
    			<li>
    				<img src="<?php echo $rs['picurl']?>"/>
    				<div class="bg"><?php echo $rs['title']?></div>
    				<div class="content">
    					<span><?php echo date("Y-m-d",strtotime($rs['fdate']))?></span>
    					<p><?php echo $rs['content']?></p>
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
				if($dataTotal>$pageSize){
					echo "<a href=productlist.php?pageNow=1&typeid={$typeid}>首页</a>";
					echo "<a href=productlist.php?pageNow={$prePage}&typeid={$typeid}>上一页</a>";
					
					for($i=$upPage;$i<=$downPage; $i++){
						if($i==$pageNow){
							echo "<span>$i</span>";
						}else{
						echo "<a href=productlist.php?pageNow={$i}&typeid={$typeid}>$i</a>";
						}
					}
					
					echo "<a href=productlist.php?pageNow={$nextPage}&typeid={$typeid}>下一页</a>";
					echo "<a href=productlist.php?pageNow={$pageTotal}&typeid={$typeid}>尾页</a>";
						}else{
							echo "";
					}
    		?>
    	</ol>
    </div>
</div>
<?php require('footer.php')?>
</body>
</html>
<script>
//禁止横向的滚动条
document.documentElement.style.overflowX="hidden";
</script>