<?php
	require('../conn.php');
	$sql="select * from detailtype,newstype where detailtype.typeid=newstype.typeid";
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
	<h4>当前您正在管理的是二级栏目,<a href="detailtype_add.php">点击此处</a> 添加新的栏目</h4>
	<div class="main deta">
		<form action="operate.php?action=detailtype" method="post">
			<table cellspacing="0">
				<tr>
					<th>类别编号</th>
					<th>二级栏目名称</th>
					<th>一级栏目名称</th>
                    <th>栏目地址</th>
					<th>创建时间</th>
					<th>操作</th>
				</tr>
				<?php foreach($rows as $rs){?>
                <input type="hidden" name="detailid[]" value="<?php echo $rs['detailid']?>">
					<tr>
						<td><?php echo $rs['detailid']?></td>
						<td><input type="text" name="detailname[]" value="<?php echo $rs['detailname']?>"></td>
						<td>
                        <select name="typeid[]">
                        	<?php
                            	$sql="select * from newstype where typeid in(select typeid from news)";
								$stmk=$pdo->query($sql);
								while($row=$stmk->fetch(PDO::FETCH_ASSOC)){
							?>
                            <option value="<?php echo $row['typeid']?>" <?php if($rs['typeid']==$row['typeid']){?> selected<?php }?>><?php echo $row['typename']?></option>
                            <?php }?>
                            </select>
                        </td>
                        <td><input type="text" name="url[]" value="<?php echo $rs['url']?>"></td>
						<td><input type="text" name="ddate[]" value="<?php echo $rs['ddate']?>"></td>
						<td><a href="type_del.php?detailid=<?php echo $rs['detailid']?>" onClick="return confirm('确定要删除?')">| 删除 | </a></td>
					</tr>
				<?php }?>
                <tr>
                	<td colspan="6" align="right"><input type="submit" value="确认修改"></td>
                </tr>
			</table>
		</form>
	</div>
</body>
</html>
