<?php 
require('../conn.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="delete from news where id={$id}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('删除成功'); location='newslist.php'</script>";
		}
	}
?>