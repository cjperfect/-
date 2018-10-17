<?php 
	require('../conn.php');
	$fid=$_GET['fid'];
	$sql="delete from focus where fid={$fid}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('删除成功');location='focuslist.php'</script>";
		}
?>