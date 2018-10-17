<?php 
	require('../conn.php');
	if(isset($_GET['typeid'])){
	$typeid=$_GET['typeid'];
	$sql="select * from infotype where typeid={$typeid}";
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
	<form action="infotype_edit.php?action=edit"method="post" enctype="multipart/form-data">
    	<table cellspacing="0">
        <input type="hidden" value="<?php echo $typeid?>" name="typeid">
            <tr>
            	<td align="right">单页栏目名称 : </td>
                <td align="left"><input type="text" value="<?php echo $row['typename']?>" name="typename"></td>
            </tr>
            <tr>
            	<td align="right">创建时间 : </td>
                <td align="left"><input type="text" value="<?php echo $row['fdate']?>" name="fdate"></td>
            </tr>
            <tr>
            	<td align="right">上传图片 : </td>
                <td align="left"><input type="text" name="typepic" value="<?php echo  $row['typepic']?>" id="url3"><input type="button" value="上传图片" id="image3"></td>
            </tr>
            <tr>
            	<td  align="right" style="border:none"><input type="submit" value="确认提交"></td>
            </tr>
            </tr>
        </table>
    </form>
</div>
<?php }?>

<?php 
	if(isset($_GET['action'])){
		$typepic=$_POST['typepic'];
		$typeid=$_POST['typeid'];
		$typename=$_POST['typename'];
		$fdate=$_POST['fdate'];
		$sql="update infotype set typename='{$typename}',typepic='{$typepic}' where typeid={$typeid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>alert('修改成功');location='infotypelist.php'</script>";
			}
		}
?>

