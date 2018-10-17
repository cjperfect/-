<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>ChenJiang后台</title>
<link href="css/admin.css" rel="stylesheet" />
<script src="js/jquery-1.11.0.js"></script>
<script>
function CheckForm()
{
	if($("#adminname").val() == "")
	{
		alert("请输入用户名！");
		$("#adminname").focus();
		return false;
	}
	if($("#password").val() == "")
	{
		alert("请输入密码！");
		$("#password").focus();
		return false;
	}
}

$(function(){
	$(".loginForm input").keydown(function(){
		$(this).prev().hide();
	}).blur(function(){
		if($(this).val() == ""){
			$(this).prev().show();
		}
	});

	$("#adminname").focus(function(){
		$("#adminname").attr("class", "uname inputOn");
	}).blur(function(){
		$("#adminname").attr("class", "uname input");
	});

	$("#password").focus(function(){
		$("#password").attr("class", "pwd inputOn");
	}).blur(function(){
		$("#password").attr("class", "pwd input");
	});
	
	$("#validate").focus(function(){
		$("#validate").attr("class","bxon");
	}).blur(function(){
		$("#validate").attr("class", "bx");
	});
	

	$("#adminname").focus();
});
</script>
</head>

<body class="loginBody">
<div class="loginTop" style="background-color:;background-image: url(images/loginbg_02.jpg);background-repeat:repeat-x;background-position:center 0;">
	<div class="logo"><a href="http://hbxnseo.com" target="_blank"></a></div>
	<div class="text"><span class="note">开发设计 : ChenJiang 网址：www.hbxnseo.com</span>
				</div>
</div>
<div class="loginWarp">
	<div class="loginArea">
		<div class="loginHead"> </div>
		<div class="loginTxt">登录管理中心</div>
		<div class="loginForm">
			<form name="login" method="post" action="checklogin.php" onSubmit="return CheckForm()">
				<div class="txtLine">
					<label>用户名</label>
					<input type="text" name="adminname" id="adminname" class="uname input" maxlength="20" />
				</div>
				<div class="txtLine mar8">
					<label>密码</label>
					<input type="password" name="password" id="password" class="pwd input" maxlength="16" />
				</div>
				
                <div class="check_str txtLines">
                        <label>验证码</label>
                        <input type="text" name="ckcode" class="login_area_ckstr" id="ckcode" maxlength="4"  style="float:left"/>
                      <div style="float:left; margin-left:5px;"><img src="ckcode.php" title="看不清？点击更换"  style="cursor:pointer; "  onclick="this.src='ckcode.php?rand='+Math.random()" /> </div>
  				</div>
                
                
			  <div class="hr_1"></div>
				<input type="submit" class="loginBtn" value="登 陆" style="cursor:pointer;" />
				<input type="hidden" name="dopost" value="login" />
			</form>
			<div class="loginThanks">感谢您使用<span>ChenJiang</span>产品</div>
		</div>
	</div>
</div>
<div class="loginCopyright">&copy; 2017 ChenJiang.com</div>
</body>
</html>
