<?php 
	require('../www/conn.php');
	$typeid=$_GET['typeid'];
	$sql="delete from infotype where typeid={$typeid}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('删除成功');location='infotypelist.php'</script>";
		}
?>