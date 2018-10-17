<?php 
	require('../conn.php');
	if(isset($_GET['detailid'])){
		$detailid=$_GET['detailid'];
		$sql="select * from detailtype where detailid={$detailid}";
		$stmt=$pdo->query($sql);
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
<form action="detailtype_edit.php?detailid=<?php echo $detailid?>&action=edit" method="post">
	<table cellspacing="0">
    	<tr>
        	<td align="right">一级栏目名称 :</td>
         	<td align="left"><input type="text" name="detailname" value="<?php echo $row['detailname']?>"></td>
         </tr>
        <tr>
        	<td align="right">二级栏目名称 :</td>
         	<td align="left">
            	<select name="typeid">
                <?php 
					$sql="select * from newstype";
					$stmt=$pdo->query($sql);
					while($rs=$stmt->fetch(PDO::FETCH_ASSOC)){
				?>
					<option value="<?php echo $rs['typeid']?>" <?php if($row['typeid']==$rs['typeid']){?> selected='selected'<?php }?>><?php echo $rs['typename']?></option>
                    <?php }?>
                </select>
            </td>
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
 	if(isset($_GET['detailid'])&isset($_GET['action'])){
		$detailid=$_GET['detailid'];
		$detailname=$_POST['detailname'];
		$typeid=$_POST['typeid'];
		$sql="update detailtype set detailname='{$detailname}',typeid={$typeid} where detailid={$detailid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='detailtypelist.php'</script>";
			}
		}
 	
 ?>
