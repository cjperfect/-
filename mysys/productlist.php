<?php
	require('../conn.php');
	$sql="select * from productype,product where productype.typeid=product.tid";
	$stmt=$pdo->query($sql);
	$dataTotal=$stmt->rowCount();
	$pageSize=15;
	$pageTotal=ceil($dataTotal/$pageSize);
	if(isset($_GET['pageNum'])){
		$pageNum=$_GET['pageNum'];
		}else{
		$pageNum=1;
			}
	$dataStart=($pageNum-1)*$pageSize;
	$sql="select * from productype,product where productype.typeid=product.tid  order by fdate desc limit $dataStart,$pageSize";
	$stmt=$pdo->query($sql);
	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="css/index.css">
</head>

<body>
<div class="main">
	<table cellspacing="0">
    	<tr>
            <th>序号</th>
        	<th>产品类别</th>
            <th>产品标题</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        <?php foreach($rows as $rs){?>
        <tr>
        	<td><?php echo $rs['pid']?></td>
        	<td><?php echo $rs['typename']?></td>
        	<td><?php echo $rs['title']?></td>
        	<td><?php echo $rs['fdate']?></td>
            <td><a href="product_edit.php?pid=<?php echo $rs['pid']?>">[编辑] </a> <a href="product_del.php?pid=<?php echo $rs['pid']?>" onClick="return confirm('确定要删除?')">[删除]</a></td>
        </tr>
        <?php }?>
    </table>
   <center>
<?php	
	$beginData=$pageNum-4;
	$endData=$pageNum+5;
	if($beginData>$pageTotal-9){
		$beginData=$pageTotal-9;
		}
	if($beginData<=1){
		$beginData=1;
		}
	if($endData<10){
		$endData=10;
		}
	if($endData>=$pageTotal){
		$endData=$pageTotal;
		}
	if($pageNum>1){
	$prePage=$pageNum-1;
	}else{
	$prePage=$pageNum;
		}		
	
	if($pageNum<$pageTotal){
	$nextPage=$pageNum+1;
	}else{
	$nextPage=$pageNum;
		}
		echo "<a href='productlist.php?pageNum=1'>首页 &nbsp;</a>";
		echo "<a href='productlist.php?pageNum={$prePage}'> &nbsp;上一页&nbsp;</a>";
		for($i=$beginData;$i<=$endData;$i++){
				if($i==$pageNum){
				echo "<span>$i</span>";
					}else{
				echo "<a href=productlist.php?pageNum={$i}> &nbsp;$i&nbsp; </a>";
					}
			}
		echo "<a href='productlist.php?pageNum={$nextPage}'> &nbsp;下一页 &nbsp;</a>";
		echo "<a href='productlist.php?pageNum={$pageTotal}'>&nbsp; 尾页</a>";
?>
</center>
</div>
</body>
</html>