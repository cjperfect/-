<?php
	require('../conn.php');
	if(isset($_GET['fid'])){
	$fid=$_GET['fid'];
	$sql="select * from focus where fid={$fid}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
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
<link rel="stylesheet" href="css/index.css">
<div class="main">
<form action="focus_edit.php?action=edit" method="post" enctype="multipart/form-data">
	<table cellspacing="0">
    <input type="hidden" name="fid" value="<?php echo $fid?>">
    	<tr>
        	<td align="right">焦点图标题 : </td>
            <td align="left"><input type="text" name="title" value="<?php echo $row['title']?>"></td>
        </tr>
        <tr>
        	<td align="right">发布时间 : </td>
            <td align="left"><input type="text" name="fdate" value="<?php echo $row['fdate']?>"></td>
        </tr>
        <tr>
        	<td align="right">上传图片 :  </td>
            <td align="left"><input type="text" name="picurl" value="<?php echo $row['picurl']?>" id="url3"> <input type="button" value="上传图片" id="image3"></td>
        </tr>
        <tr>
        	<td align="right" style="border:none;"><input type="submit" value="点击提交"></td>
        </tr>
    </table>
    </form>
</div>
<?php }?>

<?php
	if(isset($_GET['action'])){
		$picurl=$_POST['picurl'];
		$fid=$_POST['fid'];
		$title=$_POST['title'];
		$sql="update focus set title='{$title}', picurl='{$picurl}' where fid={$fid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>alert('修改成功');location='focuslist.php'</script>";
			}
		}
?>