<?php 
require('../conn.php');
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$sql="select * from news where id={$id}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}
	$typeid=$_POST['typeid'];
	$sql="select * from detailtype where typeid=$typeid";
	$stmt=$pdo->query($sql);
	
	while($rt=$stmt->fetch(PDO::FETCH_ASSOC)){
		if($row['detailid']==$rt['detailid']){
		echo "<option value='{$rt['detailid']}' selected>{$rt['detailname']}</option>";
		}else{
		echo "<option value='{$rt['detailid']}' >{$rt['detailname']}</option>";
			}
		}
?>