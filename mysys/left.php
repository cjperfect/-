<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style>
*{padding:0px; margin:0px;}
.list{padding:0px 20px 0px 20px;}
.list h4{color:black; font-size: 16px; margin-bottom: 10px; margin-top:10px; cursor: pointer; padding-left:30px;}
.list ul{display: none;}
.list ul li{list-style: none; font-size: 13px; padding-top:10px; padding-left: 30px;}
.list ul li a{color:#999; text-decoration: none;}
.list ul li a:hover{color:red;}
</style>
</head>

<body>
	<div class="list">
	
		<h4>网站系统管理</h4>
		<ul>
			<li><a href="index.php" target="_parent">系统首页</a></li>
			<li><a href="adminlist.php" target="main">管理员管理</a></li>
			<li><a href="web_config.php" target="main">网站信息配置</a></li>
			<li><a href="db_backup/database_backup.php" target="main">数据库管理</a></li>
		</ul>
		
		<h4>新闻管理</h4>
		<ul>
			<li><a href="newstypelist.php" target="main">一级栏目管理</a></li>
			<li><a href="detailtypelist.php" target="main">二级栏目管理</a></li>
            <li><a href="infotypelist.php" target="main">单页栏目管理</a></li>
			<li><a href="infolist.php" target="main">单页信息管理</a></li>
			<li><a href="info_add.php" target="main">单页信息添加</a></li>
			<li><a href="focuslist.php" target="main">焦点新闻管理</a></li>
			<li><a href="focus_add.php" target="main">焦点新闻添加</a></li>
			<li><a href="newslist.php" target="main">新闻信息管理</a></li>
			<li><a href="news_add.php" target="main">新闻信息添加</a></li>
		</ul>
		
		<h4>产品管理</h4>
		<ul>
			<li><a href="producttypelist.php" target="main">产品类别管理</a></li>
			<li><a href="productlist.php" target="main">全部产品</a></li>
			<li><a href="product_add.php" target="main">产品添加</a></li>
		</ul>
		<h4>其他管理</h4>
		<ul>
			<li><a href="linklist.php" target="main">链接管理</a></li>
			<li><a href="editfile.php" target="main">下载管理</a></li>
		</ul>
	</div>
</body>
</html>
<script src="js/jquery-1.11.0.js"></script>
<script>
$(function(){
	$('.list h4').click(function(){
		$(this).next().slideDown(500);
		$(".list ul").not($(this).next()).slideUp(500);
	})
})
</script>