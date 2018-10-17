<?php
	require('../conn.php');
	
	if(isset($_GET['typeid'])){
		$typeid=$_GET['typeid'];
		$sql="delete from newstype where typeid={$typeid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='newstypelist.php'</script>";
		}
}
	if(isset($_GET['detailid'])){
		$detailid=$_GET['detailid'];
		$sql="delete from detailtype where detailid={$detailid}";
		$stmt=$pdo->query($sql);
		if($stmt){
			echo "<script>location='detailtypelist.php'</script>";
			}
		}
?>