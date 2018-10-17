<?php 
	require('../conn.php');
	if($_GET['action']=='newstype'){
	$typeid=$_POST['typeid'];
	$typename=$_POST['typename'];
	$fdate=$_POST['fdate'];
	$typeurl=$_POST['typeurl'];
	$num=count($typeid);
	for($i=0;$i<$num;$i++){
		$sql="update newstype set typename='{$typename[$i]}',fdate='{$fdate[$i]}',typeurl='{$typeurl[$i]}' where typeid='{$typeid[$i]}'";
		$stmt=$pdo->query($sql);
		}
if($stmt){
		echo "<script>alert('修改成功');location='newstypelist.php'</script>";
		}
	}
	
	
	if($_GET['action']=='detailtype'){
		$detailid=$_POST['detailid'];
		$detailname=$_POST['detailname'];
		$typeid=$_POST['typeid'];
		$url=$_POST['url'];
		$ddate=$_POST['ddate'];
		$num=count($detailid);
		for($i=0;$i<$num; $i++){
			$sql="update detailtype set detailname='{$detailname[$i]}',typeid='{$typeid[$i]}',url='{$url[$i]}',ddate='{$ddate[$i]}' where detailid='{$detailid[$i]}'";
			$stmt=$pdo->query($sql);
			}	
			if($stmt){
				echo "<script>alert('修改成功');location='detailtypelist.php'</script>";
				}
		}
		
		
	if($_GET['action']=='config'){
		$orderid=$_POST['orderid'];
		$varvalue=$_POST['varvalue'];
		$num=count($orderid);
		for($i=0;$i<$num; $i++){
			$sql="update webconfig set varvalue='{$varvalue[$i]}' where orderid='{$orderid[$i]}'";
			$stmt=$pdo->query($sql);
			var_dump($stmt);
			}
	if($stmt){
			echo "<script>alert('修改成功');location='web_config.php'</script>";
			}
	}
	
	if($_GET['action']=='producttype'){
		$typeid=$_POST['typeid'];
		$typename=$_POST['typename'];
		$ename=$_POST['ename'];
		$num=count($typeid);
		for($i=0; $i<$num; $i++){
			$sql="update productype set typename='{$typename[$i]}',ename='{$ename[$i]}' where typeid={$typeid[$i]}";
			$stmt=$pdo->query($sql);
			}
		if($stmt){
			echo "<script>alert('修改成功');location='producttypelist.php'</script>";
			}
		}
?>