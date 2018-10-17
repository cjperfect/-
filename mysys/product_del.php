<?php 
	require('../conn.php');
	$pid=$_GET['pid'];
	$sql="delete from product where pid={$pid}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('删除成功');location='productlist.php'</script>";
		}
?>