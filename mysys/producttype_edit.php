<?php 
	require('../conn.php');
	if(isset($_GET['typeid'])){
	$typeid=$_GET['typeid'];
	$sql="select * from productype where typeid={$typeid}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
	<form action="producttype_edit.php?action=edit" method="post" enctype="multipart/form-data">
    	<table cellspacing="0">
        <input type="hidden" name="typeid" value="<?php echo $typeid?>"> 
        	<tr>
            	<td align="right">产品类别名称 : </td>
                <td align="left"><input type="text" name="typename" value="<?php echo $row['typename']?>"></td>
            </tr>
        	<tr>
            	<td align="right">英文名称 : </td>
                <td align="left"><input type="text" name="ename" value="<?php echo $row['ename']?>"></td>
            </tr>
        	<tr>
            	<td align="right">产品类别图片 : </td>
                <td align="left"><input type="text" name="typepic" value="<?php echo $row['typepic']?>" id="url3"> <input type="button" value="上传图片" id="image3"></td>
            </tr>
            <tr>
            	<td style="border:none;"><input type="submit" value="确认提交"></td>
            </tr>
        </table>
    </form>
</div>
<?php }?>
    
<?php
	if(isset($_GET['action'])){
		$typeid=$_POST['typeid'];
		$typename=$_POST['typename'];
		$ename=$_POST['ename'];
		$typepic=$_POST['typepic'];
		$sql="update productype set typename='{$typename}',ename='{$ename}',typepic='{$typepic}' where typeid={$typeid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>alert('修改成功');location='producttypelist.php'</script>"; 
			}
		}
?>

