<?php 
	require('../conn.php');
	if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	$sql="select * from product where pid={$pid}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	$sql="select * from productype";
	$stmt=$pdo->query($sql);
	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/index.css">
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				allowFileManager : true
			});
		});
KindEditor.ready(function(K) {
	var editor = K.editor({
		allowFileManager : true
	});
	K('#image3').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				showRemote : false,
				imageUrl : K('#url3').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#url3').val(url);
					editor.hideDialog();
				}
			});
		});
	});
});
</script>
 
<div class="main">
	<form action="product_edit.php?action=edit" method="post" enctype="multipart/form-data">
    	<table cellspacing="0">
        <input type="hidden" name="pid" value="<?php echo $pid?>">
        	<tr>
                <td align="right">产品标题 : </td>
                <td align="left"> <input type="text" name="title" value="<?php echo $row['title']?>"></td>
            </tr>
        	<tr>
                <td align="right">点击次数 : </td>
                <td align="left"> <input type="text" name="hit" value="<?php echo $row['hit']?>"></td>
            </tr>
        	<tr>
                <td align="right">产品类别 : </td>
                <td align="left">
                	<select name="tid">
                    <?php foreach($rows as $rs){?>
                    	<option value="<?php echo $rs['typeid']?>" <?php if($row['tid']==$rs['typeid']){?> selected <?php }?>><?php echo $rs['typename']?></option>
					<?php }?>
                  	</select>
                </td>
            </tr>
        	<tr>
                <td align="right">创建时间 : </td>
                <td align="left"> <input type="text" name="fdate" value="<?php echo $row['fdate']?>"></td>
            </tr>
        	<tr>
                <td align="right">上传图片 : </td>
                <td align="left"> <input type="text" name="picurl" value="<?php echo $row['picurl']?>" id="url3"> <input type="button" value="上传图片" id="image3"></td>
            </tr>
            <tr>
                <td align="right">内容说明 : </td>
                <td align="left"><textarea name="content" style="width:800px;height:350px;" id="content"><?php echo $row['content']?></textarea></td>
			</tr>	
            <tr>
            	<td align="right" style="border:none;"><input type="submit" value="确认修改"></td>
            </tr>
        </table>
    </form>
</div>
<?php }?>
<?php
	if(isset($_GET['action'])){
		$pid=$_POST['pid'];
		$title=$_POST['title'];
		$hit=$_POST['hit'];
		$fdate=$_POST['fdate'];
		$tid=$_POST['tid'];
		$picurl=$_POST['picurl'];
		$content=$_POST['content'];
		$sql="update product set title='{$title}',hit='{$hit}',fdate='{$fdate}',tid='{$tid}',picurl='{$picurl}',content='{$content}' where pid={$pid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>alert('修改成功');location='productlist.php'</script>";
			}
		}
?>