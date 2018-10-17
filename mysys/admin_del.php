<?php 
	require('../conn.php');
	$mid=isset($_GET['mid'])?$_GET['mid']:'';
	$sql="delete from admin where mid={$mid}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>location='adminlist.php'</script>";
	}
?>