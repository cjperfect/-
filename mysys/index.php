<?php
	session_start();
	if(!isset($_SESSION['adminname'])){
		echo "<script>location='login.php'</script>";
		exit;
		}
	require('../conn.php');
	$mid=$_SESSION['mid'];
	$sql="select * from admin where mid={$mid}";
	$stmt=$pdo->query($sql);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理中心</title>
<link rel="stylesheet" href="css/index.css">
</head>

<body>
<div id="header">
	<div class="user">
		<div class="username">Hi,ChenJiang</div>
	</div>
	<div class="top">
		<span>本次登录 : <?php echo $_SESSION['date']?>&nbsp;<?php echo $_SERVER['REMOTE_ADDR']?></span>
		<span>上次登录 : <?php echo $row['logindate']?>&nbsp; <?php echo $row['loginip']?></span>
		<a href="../index.php" target="_blank">网站首页</a><a href="logout.php">退出</a>
	</div>
</div>

<div id="container">
	<div class="left">
		<iframe src="left.php" frameborder="0" >
			你的浏览器不支持iframe框架
		</iframe>
	</div>
	<div class="main">
		<iframe src="home.php" frameborder="0" name="main">
			你的浏览器不支持iframe框架
		</iframe>
	</div>
</div>

</body>
</html>
