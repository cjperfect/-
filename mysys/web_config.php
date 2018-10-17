<?php
	require('../webconfig.php');
	require('../conn.php');
	$sql="select * from webconfig";
	$stmt=$pdo->query($sql);
	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/index.css">
<div class="main">
	<table cellspacing="0">
		<form action="operate.php?action=config" method="post">
			<?php foreach($rows as $rs){?>
            <input type="hidden" name="orderid[]" value="<?php echo $rs['orderid']?>">
				<tr>
					<td align="right"><?php echo $rs['varinfo']?> : </td>
					<?php if($rs['vartype']=="bstring"){?>
						<td align="left"><textarea name="varvalue[]" cols="45" rows="8"><?php echo $rs['varvalue']?></textarea></td>
					<?php }else{?>
					<td align="left"><input type="text" name="varvalue[]" value="<?php echo $rs['varvalue']?>"></td>
					<?php }?>
				</tr>
			<?php }?>
			<tr>
				<td colspan="2"><input type="submit" value="提交"></td>
			</tr>
		</form>
	</table>
</div>
<?php
?>