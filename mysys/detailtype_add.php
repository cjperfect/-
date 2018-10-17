<?php 
	require('../conn.php');
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
<form action="detailtype_add.php?action=add" method="post">
	<table cellspacing="0">
    	<tr>
        	<td align="right">二级栏目名称 :</td>
         	<td align="left"><input type="text" name="detailname" value=""></td>
         </tr>
        <tr>
        	<td align="right">一级栏目名称 :</td>
         	<td align="left">
            	<select name="typeid">
                <?php 
					$sql="select * from newstype";
					$stmt=$pdo->query($sql);
					while($rs=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
					<option value="<?php echo $rs['typeid']?>"><?php echo $rs['typename']?></option>
                    <?php }?>
                </select>
            </td>
         </tr>
    	<tr>
        	<td align="right">创建时间 :</td>
         	<td align="left"><input type="text" name="fdate" value="<?php echo date('Y-m-d H:i:s');?>"></td>
         </tr>
        <tr>
        	<td align="right">栏目地址 :</td>
         	<td align="left"><input type="text" name="url" value=""></td>
       	</tr>
		<tr>
        	<td align="center" colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</div>    
<?php
	if(isset($_GET['action'])){
		$detailname=$_POST['detailname'];
		$typeid=$_POST['typeid'];
		$url=$_POST['url'];
		$ddate=$_POST['fdate'];
		$sql="insert into detailtype(detailname,typeid,url,ddate) values('{$detailname}','{$typeid}','{$url}','{$ddate}')";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='detailtypelist.php'</script>";
			}
		}
		
	
?>
