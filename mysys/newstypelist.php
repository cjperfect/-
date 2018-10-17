<?php
	require('../conn.php');
	$sql="select * from newstype";
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
	<h4>当前您正在管理的是一级栏目,<a href="newstype_add.php">点击此处</a> 添加新的栏目</h4>
	<div class="main deta">
		<form action="operate.php?action=newstype" method="post">
			<table cellspacing="0">
				<tr>
					<th>类别编号</th>
					<th>一级栏目名称</th>
					<th>创建时间</th>
					<th>栏目地址</th>
					<th>操作</th>
				</tr>
				<?php foreach($rows as $rs){?>
                <input type="hidden" name="typeid[]" value="<?php echo $rs['typeid']?>">
					<tr>
						<td><?php echo $rs['typeid']?></td>
						<td><input type="text" name="typename[]" value="<?php echo $rs['typename']?>"></td>
						<td><input type="text" name="fdate[]" value="<?php echo $rs['fdate']?>"></td>
						<td><input type="text" name="typeurl[]" value="<?php echo $rs['typeurl']?>"></td>
						<td><a href="type_del.php?typeid=<?php echo $rs['typeid']?>" onClick="return confirm('确定要删除?')">| 删除 | </a></td>
					</tr>
				<?php }?>
                <tr>
                	<td align="right" colspan="5"><input type="submit" value="确认修改"></td>
                </tr>
			</table>
		</form>
	</div>
</body>
</html>
