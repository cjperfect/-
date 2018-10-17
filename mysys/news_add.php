<?php
require('../conn.php');
 ?>
 <script src="js/jquery-1.11.0.js"></script>
 <script>
 $(function(){
	 window.onload=function(){
		 $.post('ajax.php',{'typeid':$('#typeid').val()},function(data){
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
    <form action="news_exec.php?action=add" method="post" enctype="multipart/form-data">
 	<table cellspacing="0">
    	<tr>
        	<td align="right">新闻标题 : </td>
        	<td align="left"> <input type="text" name="title" value=""></td>
        </tr>
    	<tr>
        	<td align="right">新闻点击数 : </td>
        	<td align="left"> <input type="text" name="hit" value="0"></td>
        </tr>
    	<tr>
        	<td align="right">创建时间 : </td>
        	<td align="left"> <input type="text" name="fdate" value="<?php echo date('Y-m-d H:i:s');?>"></td>
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
                	<option value="<?php echo $rs['typeid']?>"><?php echo $rs['typename']?></option>
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
        	<td align="right">上传图片 : </td>
        	<td  align="left"> <input type="text" name="picurl" value="" id="url3"><input type="button"  id="image3" value="上传图片"></td>
        </tr>
	<tr>
        <td align="right" valign="middle"> 新闻内容 : </td>
        <td align="left">
                <textarea name="content" style="width:800px;height:350px;" id="content"></textarea>
</td>
    </tr>
    <tr>
    	<td align="right" style="border:none"><input type="submit" value="点击提交"></td>
    </tr>
    </table>
    </form>
 </div>
