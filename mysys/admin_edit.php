<?php 
	require('../conn.php');
	$mid=isset($_GET['mid'])?$_GET['mid']:'';
	$sf=isset($_GET['sf'])?$_GET['sf']:'';
	$sql="select * from admin where mid={$mid}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="main">
	<center>
		<form action="adminedit.php" method="post">
			用户名 : <input type="text" name="adminname" value="<?php echo $row['adminname']?>"><br>
			密码 : <input type="text" name="password" value="<?php echo $row['password']?>"><br>
			<input type="submit" value="提交">
		</form>
	</center>
</div>

