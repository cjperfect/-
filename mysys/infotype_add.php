<?php require('../conn.php')?>
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
	<form action="infotype_add.php?action=add"method="post" enctype="multipart/form-data">
    	<table cellspacing="0">
            <tr>
            	<td align="right">单页栏目名称 : </td>
                <td align="left"><input type="text" value="" name="typename"></td>
            </tr>
            <tr>
            	<td align="right">添加时间 : </td>
                <td align="left"><input type="text" value="<?php echo date("Y-m-d H:i:s") ?>" name="fdate"></td>
            </tr>
            <tr>
            	<td align="right">上传图片 : </td>
                <td align="left"><input type="text" name="typepic" value="" id="url3"><input type="button" value="上传图片" id="image3"></td>
            </tr>
            <tr>
            	<td  align="right" style="border:none"><input type="submit" value="确认提交"></td>
            </tr>
            </tr>
        </table>
    </form>
</div>
<?php
	if(isset($_GET['action'])){
		$typepic=$_POST['typepic'];
		$typename=$_POST['typename'];
		$fdate=$_POST['fdate'];
		$sql="insert into infotype(typename,typepic,fdate) values('{$typename}','{$typepic}','{$fdate}')";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>alert('添加成功'); location='infotypelist.php'</script>";
			}
		}
?>
