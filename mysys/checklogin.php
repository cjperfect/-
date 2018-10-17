<?php
	session_start();
	require('../conn.php');
	$ckcode=strtolower($_POST['ckcode']);
	$sckcode=strtolower(str_replace(' ','',$_SESSION['ckcode']));
	if($ckcode!=$sckcode){
		echo "<script>alert('验证码不正确');location='login.php'</script>";
		exit;
		}
	$adminname=$_POST['adminname'];
	$password=$_POST['password'];
	$sql="select * from admin where adminname='{$adminname}' and passview='{$password}'";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row){
		$_SESSION['adminname']=$adminname;
		$_SESSION['mid']=$row['mid'];
		$_SESSION['date']=date('Y-m-d H:i:s');
		$logindate=date('Y-m-d H:i:s');
		$loginip=$_SERVER['REMOTE_ADDR'];
		$sql="update admin set loginip='{$loginip}',logindate='{$logindate}' where mid='{$row['mid']}'";
		$pdo->query($sql);
		echo "<script>alert('登录成功');location='index.php'</script>";
	}else{
		echo "<script>alert('用户名或密码错误');location='login.php'</script>";
		}
?>
