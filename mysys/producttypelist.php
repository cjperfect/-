<?php
	require('../conn.php');
	$sql="select * from productype ";
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
	<form action="operate.php?action=producttype" method="post">
    	<table cellspacing="0">
        	<tr>
            	<th>产品类别编号</th>
                <th>产品类别名称</th>
                <th>英文名称</th>
                <th>操作</th>
            </tr>
            <?php foreach($rows as $rs){?>
            <input type="hidden" name="typeid[]" value="<?php echo $rs['typeid']?>">
            	<tr>
                	<td><?php echo $rs['typeid']?></td>
                    <td><input type="text" name="typename[]" value="<?php echo $rs['typename']?>"></td>
                    <td><input type="text" name="ename[]" value="<?php echo $rs['ename']?>"></td>
                    <td><a href="producttype_edit.php?typeid=<?php echo $rs['typeid']?>">[编辑] </a>  <a href="producttype_del.php?typeid=<?php echo $rs['typeid']?>" onClick="return confirm('确定要删除?')"> [删除]</a></td>
                </tr>
            <?php }?>
            <tr>
            	<td colspan="4" align="right"><input type="submit" value="确认提交"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>