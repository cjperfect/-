<?php
require('../conn.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from news where id={$id}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>
 <script src="js/jquery-1.11.0.js"></script>
 <script>
 $(function(){
	 window.onload=function(){
		 $.post('ajax.php',{'typeid':$('#typeid').val(),'id':$('form:eq(0)').attr('id')},function(data){
			 $('#detaliid').html(data);
			 console.log(data);
			 })
	 }
	 
		 $('#typeid').change(function(){
			 $.post('ajax.php',{'typeid':$(this).val()},function(data){
				 $('#detaliid').html(data);
				 })
			 })
		
	 })
 </script>
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
    <form action="news_exec.php" method="post" id="<?php echo $id?>" enctype="multipart/form-data">
 	<table cellspacing="0">
    <input type="hidden" name="id" value="<?php echo $id?>">
    	<tr>
        	<td align="right">新闻标题 : </td>
        	<td align="left"> <input type="text" name="title" value="<?php echo $row['title']?>"></td>
        </tr>
    	<tr>
        	<td align="right">新闻点击数 : </td>
        	<td align="left"> <input type="text" name="hit" value="<?php echo $row['hit']?>"></td>
        </tr>
         <tr>
        	<td align="right">一级栏目 : </td>
        	<td align="left" >
             <select name="typeid" id="typeid">
            	<?php
                	$sql="select * from newstype where tag<>'Y'";
					$stmt=$pdo->query($sql);
					while($rs=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
                	<option value="<?php echo $rs['typeid']?>"<?php if($row['typeid']==$rs['typeid']){?>selected<?php }?>><?php echo $rs['typename']?></option>
                <?php }?>
                </select>
            </td>
        </tr>
         <tr>
        	<td align="right">二级栏目 : </td>
        	<td  align="left">
            	 <select name="detailid" id="detaliid"></select>
            </td>
        </tr>
         <tr>
        	<td align="right">创建时间 : </td>
        	<td  align="left"> <input type="text" name="fdate" value="<?php echo $row['fdate']?>"></td>
        </tr>
         <tr>
        	<td align="right">上传图片 : </td>
        	<td  align="left"><input type="text" name="picurl" value="<?php echo $row['picurl']?>" id="url3"> <input type="button" value="上传图片" id="image3"></td>
        </tr>
	<tr>
        <td align="right" valign="middle"> 新闻内容 : </td>
        <td align="left">
                <textarea name="content" style="width:800px;height:350px;" id="content"><?php echo $row['content']?></textarea>
</td>
    </tr>
    <tr>
    	<td align="right" style="border:none"><input type="submit" value="点击提交"></td>
    </tr>
    </table>
    </form>
 </div>
 <?php }?>