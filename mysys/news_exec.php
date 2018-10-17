<?php 
require('../conn.php');
//新闻修改的=============================
if(isset($_POST['id'])){
	$picurl=$_POST['picurl'];
	$id=$_POST['id'];
	$title=$_POST['title'];
	$hit=$_POST['hit'];
	$typeid=$_POST['typeid'];
	$detailid=$_POST['detailid'];
	$content=$_POST['content'];
	$sql="update news set title='{$title}',hit='{$hit}',typeid='{$typeid}',detailid='{$detailid}',content='{$content}' ,picurl='{$picurl}' where id={$id}";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('修改成功');location='newslist.php'</script>";
		}
	}
//新闻添加的============================
if($_GET['action']=='add'){
	$picurl=$_POST['picurl'];
	$title=$_POST['title'];
	$hit=$_POST['hit'];
	$fdate=date('Y-m-d H:i:s');
	$typeid=$_POST['typeid'];
	$detailid=$_POST['detailid'];
	$content=$_POST['content'];
	$sql="insert into news(title,hit,fdate,typeid,detailid,picurl,content) values('{$title}','{$hit}','{$fdate}','{$typeid}','{$detailid}','{$picurl}','{$content}')";
	$stmt=$pdo->query($sql);
	if($stmt){
		echo "<script>alert('添加成功');location='newslist.php'</script>";
		}
}
?>