<?php 
	require('../conn.php');
	$typeid=$_GET['typeid'];
	$sql="delete from productype where typeid={$typeid}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('删除成功'); location='producttypelist.php'</script>";
		}
?>