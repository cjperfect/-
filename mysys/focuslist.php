<?php 
	require('../conn.php');
	$sql="select * from focus";
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
<div class="main deta">
	<table cellspacing="0">
    	<tr>
        	<th>序号</th>
            <th>焦点新闻标题</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        <?php foreach($rows as $rs){?>
        	<tr>
            	<td><?php echo $rs['fid']?></td>
                <td><input type="text" name="title" value="<?php echo $rs['title']?>"></td>
                <td><input type="text" name="fdate" value="<?php echo $rs['fdate']?>"></td>
                <td><a href="focus_edit.php?fid=<?php echo $rs['fid']?>">[编辑] </a> <a href="focus_del.php?fid=<?php echo $rs['fid']?>" onClick="return confirm('确定要删除?')">[删除]</a></td>
            </tr>
        <?php }?>
    </table>
</div>
</body>
</html>