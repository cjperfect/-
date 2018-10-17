<?php 
require('../conn.php');
$sql="select * from news,detailtype where news.detailid=detailtype.detailid";
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
$sql="select * from news,detailtype where news.detailid=detailtype.detailid  order by fdate desc limit $dataStart,$pageSize";
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
    <form action="operate.php?action=delall">
    	<tr>
        	<th><input type="checkbox"></th>
            <th>序号</th>
            <th>新闻二级栏目</th>
            <th>新闻标题</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        <?php foreach($rows as $rs){?>
        <tr>
        	<td><input type="checkbox" name="id[]" value="<?php echo $rs['id']?>"></td>
            <td><?php echo $rs['id']?></td>
            <td><?php echo $rs['detailname']?></td>
            <td><?php echo $rs['title']?></td>
            <td><?php echo $rs['fdate']?></td>
            <td><a href="news_edit.php?id=<?php echo $rs['id']?>">[编辑] </a><a href="news_del.php?id=<?php echo $rs['id']?>" onClick="return confirm('确定要删除吗?')"> [删除]</a></td>
        </tr>
        <?php }?>
        <tr>
        	<td align="right" colspan="6"><input type="submit" value="删除记录"></td>
        </tr>
        </form>
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
		echo "<a href='newslist.php?pageNum=1'>首页 &nbsp;</a>";
		echo "<a href='newslist.php?pageNum={$prePage}'> &nbsp;上一页&nbsp;</a>";
		for($i=$beginData;$i<=$endData;$i++){
				if($i==$pageNum){
				echo "<span>$i</span>";
					}else{
				echo "<a href=newslist.php?pageNum={$i}> &nbsp;$i&nbsp; </a>";
					}
			}
		echo "<a href='newslist.php?pageNum={$nextPage}'> &nbsp;下一页 &nbsp;</a>";
		echo "<a href='newslist.php?pageNum={$pageTotal}'>&nbsp; 尾页</a>";
?>
</center>
</div>
</body>
</html>