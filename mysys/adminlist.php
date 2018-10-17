<?php 
	require('../conn.php');
	$sql="select * from admin";
	$stmt=$pdo->query($sql);
	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>ID</th>
			<th>用户名</th>
			<th>创建时间</th>
			<th>上次登录时间</th>
			<th>上次登录IP</th>
			<th>操作</th>
		</tr>
		<?php foreach($rows as $rs){?>
			<tr>
				<td><?php echo $rs['mid']?></td>
				<td><?php echo $rs['adminname']?></td>
				<td><?php echo $rs['fdate']?></td>
				<td><?php echo $rs['logindate']?></td>
				<td><?php echo $rs['loginip']?></td>
				<td>
					<a href="admin_del.php?mid=<?php echo $rs['mid']?>" onClick="return confirm('确认要删除吗?');">[删除]</a> | 
					<a href="admin_edit.php?mid=<?php echo $rs['mid']?>&sf=<?php echo $rs['sf']?>">[修改密码]</a>
				</td>
			</tr>
		<?php }?>
	</table>
</div>
