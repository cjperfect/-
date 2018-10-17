<?php 
	require('../conn.php');
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
<form action="newstype_add.php?action=add" method="post">
	<table cellspacing="0">
        <tr>
        	<td align="right">一级栏目名称 :</td>
         	<td align="left"><input type="text" name="typename"></td>
         </tr>
        <tr>
        	<td align="right">创建时间 :</td>
         	<td align="left"><input type="text" name="fdate" value="<?php echo date('Y-m-d H:i:s');?>"></td>
         </tr>
        <tr>
        	<td align="right">栏目地址 :</td>
         	<td align="left"><input type="text" name="typeurl" value=""></td>
       	</tr>
		<tr>
        	<td align="center" colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</div>    
<?php
	if(isset($_GET['action'])){
		$typename=$_POST['typename'];
		$typeurl=$_POST['typeurl'];
		$fdate=$_POST['fdate'];
		$sql="insert into newstype(typename,typeurl,fdate) values('{$typename}','{$typeurl}','{$fdate}')";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='newstypelist.php'</script>";
			}
		}
		
	
?>
