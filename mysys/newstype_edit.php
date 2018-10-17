<?php 
	require('../conn.php');
	if(isset($_GET['typeid'])){
		$typeid=$_GET['typeid'];
		$sql="select * from newstype where typeid={$typeid}";
		$stmt=$pdo->query($sql);
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
<form action="newstype_edit.php?typeid=<?php echo $typeid?>&action=edit" method="post">
	<table cellspacing="0">
    	<tr>
        	<td align="right">一级栏目名称 :</td>
         	<td align="left"><input type="text" name="typename" value="<?php echo $row['typename']?>"></td>
         </tr>
        <tr>
        	<td align="right">栏目地址 :</td>
         	<td align="left"><input type="text" name="typeurl" value="<?php echo $row['typeurl']?>"></td>
       	</tr>
		<tr>
        	<td align="center" colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</div>
<?php }else{
		die('没有传递数据!');
	}?>
    
 <?php
 	if(isset($_GET['typeid'])&isset($_GET['action'])){
		$typeid=$_GET['typeid'];
		$typename=$_POST['typename'];
		$typeurl=$_POST['typeurl'];
		$sql="update newstype set typename='{$typename}',typeurl='{$typeurl}' where typeid={$typeid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='newstypelist.php'</script>";
			}
		}
 	
 ?>
