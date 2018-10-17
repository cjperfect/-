<?php
	require('../conn.php');
	$sql="select * from infotype";
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
	<h4><a href="infotype_add.php">点击此处</a> 添加新的栏目</h4>
<div class="main deta">
<form action="infotype_del.php" method="post">
	<table cellspacing="0">
    	<tr>
        	<th>编号</th>
            <th>单页栏目</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        <?php foreach($rows as $rs){?>
        	<input type="hidden" name="typeid" value="<?php echo $rs['typeid']?>">
        	<tr>
            	<td><?php echo $rs['typeid']?></td>
                <td><input type="text" name="typename" value="<?php echo $rs['typename']?>"></td>
                <td><input type="text" name="fdate" value="<?php echo $rs['fdate']?>"></td>
                <td><a href="infotype_edit.php?typeid=<?php echo $rs['typeid']?>">[编辑] </a> <a href="infotype_del.php?typeid=<?php echo $rs['typeid']?>" onClick="return confirm('确定要删除?')">[删除]</a></td>
            </tr>
        <?php }?>
    </table>
    </form>
</div>
</body>
</html>