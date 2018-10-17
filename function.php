<?php
date_default_timezone_set('PRC'); 
//标题列表
function titlelist($sql,$i,$j){
    $m=0;
	global $pdo;
	$stmt=$pdo->query($sql);
	//$rs=mysql_fetch_array($result);
	for($m=0;$m<$i;$m++){	
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<li>";
		echo "<a href=newsview.php?id=".$rs['id'].">".getstr($rs["title"],$j)."</a>";
		echo "</li>";
	}						
}

//信息题列表
function infolist($sql,$i,$j){
    $m=0;
	global $pdo;
	$stmt=$pdo->query($sql);
	//$rs=mysql_fetch_array($result);
	for($m=0;$m<$i;$m++){	
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<dd>";
		echo "<a href=infoview.php?id=".$rs['id'].">".getstr($rs["title"],$j)."</a>";
		echo "</dd>";
	}						
}
//时间列表
function datelist($sql,$i,$j){
    $m=0;
	global $pdo;
	$stmt=$pdo->query($sql);
	//$rs=mysql_fetch_array($result);
	for($m=0;$m<$i;$m++){	
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<li>";
		echo "<span>";
		echo formatime($rs["fdate"]);
		echo "</span>";
		echo "<a href=newsview.php?id=".$rs['id'].">".getstr($rs["title"],$j)."</a>";
		echo "</li>";
	}						
}
//文本标题列表,$t首行标题文本字数，$k文本字数，$i标题数目,$j标题长度
function textlist($sql,$t,$k,$i,$j){
	global $pdo;
	$stmt=$pdo->query($sql);
	//$rs=mysql_fetch_array($result);
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<h5>";
		echo "<a href=newsview.php?id=".$rs['id'].">";
		echo getstr($rs["title"],$t);
		echo "</a></h5>";
		echo "<p>";
		echo getstr(ClearHtml($rs["content"]),$k);
		echo "</p>";
		echo "<ul>";
	for($m=0;$m<$i;$m++){
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<li>";
		echo "<a href=newsview.php?id=".$rs['id'].">".getstr($rs["title"],$j)."</a>";
		echo "</li>";
	}
		echo "</ul>";
}
//图片+文本+标题列表,$k文本字数，$i标题数目,$j标题长度
function pictextlist($sql,$k,$i,$j){
    $m=0;
	global $pdo;
	$stmt=$pdo->query($sql);
	//$rs=mysql_fetch_array($result);
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<p>";
		echo "<a href=newsview.php?id=".$rs['id']."><img src='".$rs["pic"]."'></a>";
		echo getstr($rs["content"],$k);
		echo "</p>";
		echo "<ul>";
	for($m=0;$m<$i;$m++){
		$rs=$stmt->fetch(PDO::FETCH_ASSOC);
		echo "<li>";
		echo "<a href=newsview.php?id=".$rs['id'].">".getstr($rs["title"],$j)."</a>";
		echo "</li>";
	}
		echo "</ul>";
}
//增加点击数
function getNewsHit($id){
	global $pdo;
	$sql="update news set hit=hit+1 where id=".$id;
	$pdo->query($sql);
}

//增加点击数
function getInfoHit($id){
	global $pdo;
	$sql="update `info` set hit=hit+1 where id=".$id;
	$pdo->query($sql);
}

//友情链接
function friendlinks(){
	global $pdo;
	$sql="select * from `link` order by lid desc";
	$stmt=$pdo->query($sql);
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<span><a target='_blank' href=".$row["url"].">";
	echo getstr($row["linkname"],32);
	echo "</a></span>";
	}
}
//分页程序
function page($page_no,$pages){
	$url="";
	$temp=$_SERVER["QUERY_STRING"];
	$query = explode("&", $temp);
	
	foreach($query as $x){
		$a=explode("=", $x);
		
		if(!(strstr($a[0],"page")=="page")&&($temp)){
			
				$url=$url.$a[0]."=".$a[1]."&";
			}
		}
	
	if($page_no/10==0){
		$k=intval($page_no/10)-1;
		}
	else{
		$k=intval($page_no/10);
	}
		
	$mm0=intval($page_no/10-1)*10;
	$mm1=intval($page_no/10+1)*10;
	    if($mm0<=1){
			$mm0=1;
		    }
		if($mm1>=$pages){
			$mm1=$pages;
			}
	
	$star=$k*10+1;
	$end=$star+9;
	
	
	    if($star<=1){
			$star=1;
		    }
		if($end>=$pages){
			$end=$pages;
			}
	//数字区
	echo "<div class='num_pages'>";
	echo "<a href=".$_SERVER["SCRIPT_NAME"]."?".$url."page=$mm0>上一页</a>&nbsp;";
	for($i=$star;$i<=$end;$i++){
	    if($i<>$page_no){
			echo "<a href=".$_SERVER["SCRIPT_NAME"]."?".$url."page=$i>$i</a>&nbsp;";
		   }
		else{
			echo "<b>".$i."</b>&nbsp;";
			}
		}
	echo "<a href=".$_SERVER["SCRIPT_NAME"]."?".$url."page=".$mm1.">下一页</a>&nbsp;";
	echo "</div>";
}
//获取当前时间
function datetime(){
	//return strtotime("now");
	echo date("Y-n-j H:i:s",strtotime("now"));
}
//替换HTML,直接输出HTML
function unhtml($content){								//定义自定义函数的名称
	$content=htmlspecialchars($content);                //转换文本中的特殊字符
    $content=str_replace(chr(13),"<br>",$content);		//替换文本中的换行符
    $content=str_replace(chr(32),"&nbsp;",$content);	//替换文本中的&nbsp;
    $content=str_replace("[_[","<",$content);			//替换文本中的大于号
    $content=str_replace("]_]",">",$content);			//替换文本中的小于号
    $content=str_replace("|_|"," ",$content);			//替换文本中的空格
    return trim($content);								//删除文本中首尾的空格
}
//返回处理消息，$l_address：跳转地址
function re_message($result,$l_address){
	if($result)
		echo "<script>alert('操作成功！');location='".$l_address."';</script>";
	else
		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
}
//显示信息
function ShowMsg($msg='', $gourl='-1')
{
	if($gourl != '-1')
	{
		echo '<script>alert("'.$msg.'");location.href="'.$gourl.'";</script>';
	}
	else
	{
		echo '<script>alert("'.$msg.'");history.go(-1);</script>';
	}
}
//弹框
function alert($msg='星想互联欢迎您', $gourl='index.php')
{
	echo '<script>alert("'.$msg.'");location.href="'.$gourl.'";</script>';
}
/**
 * 函数goBack,返回上一页
 * @param string $msg 显示信息
 * @return boolean
 */
function goBack($msg=''){
	header("Content-type: text/html; charset=gbk");
	
	echo "<script type='text/javascript'>alert('".$msg."');history.back();</script>'";
	exit;
}
/**
 * 函数Redirect,引导其它页面
 */
function Redirect($url){
	header("Location:".$url);
	exit;
}

/**
 * 函数checkurl,判断文件是否存在
 * @param string $string 
 * @return string
 */
function chkurl($furl){
	$temp=$_SERVER['DOCUMENT_ROOT'].$furl;
	$temp=str_replace("//","/",$temp);
	if(!file_exists($temp)){
		return "images/sys.jpg";
	     }
	else{
		 return ($furl);
	     }
}


/**
 * 函数cutstr,字符截取
 * @param string $string 
 * @return string
 */
function cutstr($str,$len=20) {
		$from = 0;
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'. 
'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s', 
'$1',$str); 
}



//清除HTML
function ClearHtml($str)
{
	$str = strip_tags($str);

	//首先去掉头尾空格
	$str = trim($str);

	//接着去掉两个空格以上的
	$str = preg_replace('/\s(?=\s)/', '', $str);

	//最后将非空格替换为一个空格
	$str = preg_replace('/[\n\r\t]/', ' ', $str);

	return $str;
}
/*删除HTML代码*/
function dhtmlchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}
/**
 * 函数pregstring,去掉html标签
 * @param string $str 
 * @return string
 */
function pregstring( $str ){
	$strtemp = trim($str);
	$search = array(
	"|'|Uis",
	"|<script[^>]*?>.*?</script>|Uis", // 去掉 javascript
	"|<[\/\!]*?[^<>]*?>|Uis", // 去掉 HTML 标记
	"'>(quot|#34);'i", // 替换 HTML 实体
	"'>(amp|#38);'i",
	"|,|Uis",
	"|[\s]{2,}|is",
	"[>nbsp;]isu",
	"|[$]|Uis",
	);
	$replace = array(
	"`",
	"",
	"",
	"",
	"",
	"",
	" ",
	" ",
	" dollar ",
	);
	$text = preg_replace($search, $replace, $strtemp);
	return $text;
}
//获取ip
function GetIP(){ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
	$ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
	$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
	$ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
	$ip = $_SERVER['REMOTE_ADDR']; 
	else 
	$ip = "unknown"; 
	return($ip); 
} 
//获取网站地址
function getWebUrl(){
	$newpath = "http://";
	$newpath .= $_SERVER["HTTP_HOST"];//主机名
	$newpath .= dirname($_SERVER["REQUEST_URI"].' ');//路径
	return $newpath;
}
//获得当前的页面文件的url
function GetCurUrl()
{
	if(!empty($_SERVER["REQUEST_URI"]))
	{
		$nowurls = explode("?",$_SERVER["REQUEST_URI"]);
		$nowurl = $nowurls[0];
	}
	else
	{
		$nowurl = $_SERVER["PHP_SELF"];
	}

	return $nowurl;
}

function getstr($str,$slen,$startdd=0){ 
$restr = ""; 
$c = ""; 
$str_len = strlen($str); 
if($str_len < $startdd+1) return ""; 
if($str_len < $startdd + $slen || $slen==0) $slen = $str_len - $startdd; 
$enddd = $startdd + $slen - 1; 
for($i=0;$i<$str_len;$i++) 
{ 
if($startdd==0) $restr .= $c; 
else if($i > $startdd) $restr .= $c; 

if(ord($str[$i])>0x80){ 
if($str_len>$i+1) $c = $str[$i].$str[$i+1]; 
$i++; 
} 
else{ $c = $str[$i]; } 

if($i >= $enddd){ 
if(strlen($restr)+strlen($c)>$slen) break; 
else{ $restr .= $c; break; } 
} 
} 
return $restr; 
} 
function cn_midstr($str,$start,$len){ 
return cn_substr($str,$slen,$startdd); 
} 
/*
 * 函数说明：截取指定长度的字符串
 *utf-8专用 汉字和大写字母长度算1，其它字符长度算0.5
 * @param  string  $str  原字符串
 * @param  int     $len  截取长度
 * @param  string  $etc  省略字符...
 * @return string        截取后的字符串
 *使用示例：<?php  echo ReStrLen("yyyyyyyyyyyyy", 5, "444") ?>
 */
function getstr1($str, $len=10, $etc='...')
{
	$restr = '';
	$i = 0;
	$n = 0.0;

	//字符串的字节数
	$strlen = strlen($str);
	while(($n < $len) and ($i < $strlen))
	{
	   $temp_str = substr($str, $i, 1);

	   //得到字符串中第$i位字符的ASCII码
	   $ascnum = ord($temp_str);

	   //如果ASCII位高与252
	   if($ascnum >= 252) 
	   {
		    //根据UTF-8编码规范，将6个连续的字符计为单个字符
			$restr = $restr.substr($str, $i, 6); 
			//实际Byte计为6
			$i = $i + 6; 
			//字串长度计1
			$n++; 
	   }
	   elseif($ascnum >= 248)
	   {
			$restr = $restr.substr($str, $i, 5);
			$i = $i + 5;
			$n++;
	   }
	   elseif($ascnum >= 240)
	   {
			$restr = $restr.substr($str, $i, 4);
			$i = $i + 4;
			$n++;
	   }
	   elseif($ascnum >= 224)
	   {
			$restr = $restr.substr($str, $i, 3);
			$i = $i + 3 ;
			$n++;
	   }
	   elseif ($ascnum >= 192)
	   {
			$restr = $restr.substr($str, $i, 2);
			$i = $i + 2;
			$n++;
	   }

	   //如果是大写字母 I除外
	   elseif($ascnum>=65 and $ascnum<=90 and $ascnum!=73)
	   {
			$restr = $restr.substr($str, $i, 1);
			//实际的Byte数仍计1个
			$i = $i + 1; 
			//但考虑整体美观，大写字母计成一个高位字符
			$n++; 
	   }

	   //%,&,@,m,w 字符按1个字符宽
	   elseif(!(array_search($ascnum, array(37, 38, 64, 109 ,119)) === FALSE))
	   {
			$restr = $restr.substr($str, $i, 1);
			//实际的Byte数仍计1个
			$i = $i + 1;
			//但考虑整体美观，这些字条计成一个高位字符
			$n++; 
	   }

	   //其他情况下，包括小写字母和半角标点符号
	   else
	   {
			$restr = $restr.substr($str, $i, 1);
			//实际的Byte数计1个
			$i = $i + 1; 
			//其余的小写字母和半角标点等与半个高位字符宽
			$n = $n + 0.5; 
	   }
	}

	//超过长度时在尾处加上省略号
	if($i < $strlen)
	{
	   $restr = $restr.$etc;
	}

	return $restr;
}
// 截取字符串
function formatstr($str,$start,$len) {					//定义自定义函数的名称,控制文本输出字符的个数
    $strlen=$start+$len;
	$tmpstr="";										//获取文本的长度
    for($i=0;$i<$strlen;$i++) { 						//循环输出文本中的字符
        if(ord(substr($str,$i,1))>0xa0) { 				//截取文本中的字符
            $tmpstr.=substr($str,$i,2);					//截取文本中的字符
            $i++; 
        }else 
            $tmpstr.=substr($str,$i,1); 
    } 
    return $tmpstr;								 
}

//返回格林威治标准时间
function MyDate($format='Y-m-d H:i:s', $timest=0)
{
	global $cfg_timezone;
	$addtime = $cfg_timezone * 3600;
	if(empty($format))
	{
		$format = 'Y-m-d H:i:s';
	}
	return gmdate($format, $timest+$addtime);
}



//返回格式化(Y-m-d H:i:s)的时间
function GetDateTime($mktime)
{
	return MyDate('Y-m-d H:i:s',$mktime);
}


//返回格式化(Y-m-d)的日期
function GetDateMk($mktime)
{
	return MyDate('Y-m-d', $mktime);
}


//从普通时间转换为Linux时间截
function GetMkTime($dtime)
{
	if(!preg_match("/[^0-9]/", $dtime))
	{
		return $dtime;
	}
	$dtime = trim($dtime);
	$dt = array(1970, 1, 1, 0, 0, 0);
	$dtime = preg_replace("/[\r\n\t]|日|秒/", " ", $dtime);
	$dtime = str_replace("年", "-", $dtime);
	$dtime = str_replace("月", "-", $dtime);
	$dtime = str_replace("时", ":", $dtime);
	$dtime = str_replace("分", ":", $dtime);
	$dtime = trim(preg_replace("/[ ]{1,}/", " ", $dtime));
	$ds = explode(" ", $dtime);
	$ymd = explode("-", $ds[0]);
	if(!isset($ymd[1])) $ymd = explode(".", $ds[0]);
	if(isset($ymd[0])) $dt[0] = $ymd[0];
	if(isset($ymd[1])) $dt[1] = $ymd[1];
	if(isset($ymd[2])) $dt[2] = $ymd[2];
	if(strlen($dt[0])==2) $dt[0] = '20'.$dt[0];
	if(isset($ds[1]))
	{
		$hms = explode(":", $ds[1]);
		if(isset($hms[0])) $dt[3] = $hms[0];
		if(isset($hms[1])) $dt[4] = $hms[1];
		if(isset($hms[2])) $dt[5] = $hms[2];
	}
	foreach($dt as $k=>$v)
	{
		$v = preg_replace("/^0{1,}/", '', trim($v));
		if($v == '')
		{
			$dt[$k] = 0;
		}
	}
	
	$mt = mktime($dt[3], $dt[4], $dt[5], $dt[1], $dt[2], $dt[0]);
	if(!empty($mt)) return $mt;
	else return time();
}


//读取文件内容
function Readf($file)
{
	if(file_exists($file) && is_readable($file))
	{
		if(function_exists('file_get_contents'))
		{
			$str = file_get_contents($file);
		}
		else
		{
			$str = '';

			$fp = fopen($file, 'r');
			while(!feof($fp))
			{
				$getstr .= fgets($fp, 1024);
			}
			fclose($fp);
		}
		return $str;
	}
	else
	{
		return FALSE;
	}
}


//写入文件内容
function Writef($file,$str,$mode='w')
{
	if(file_exists($file) && is_writable($file))
	{
		if(function_exists('file_put_contents'))
		{
			file_put_contents($file, $str);
		}
		else
		{
			$fp = fopen($file, $mode);
			flock($fp, 3);
			fwrite($fp, $str);
			fclose($fp);
		}
	
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
/**
 * 系统安全函数
 *  
 * 
 */
/*post和get变量变成普通变量，防注入。*/
function daddslashes($string, $force = 0,$metinfo) {
global $met_sqlinsert;
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	$string_old = $string;
	$string = str_replace("'","",$string);
	$string = str_replace("*","",$string);
	$string = str_replace("~","",$string);
	$string = strip_tags($string);
	if(strlen($string_old)!=strlen($string)&&$met_sqlinsert){
		$reurl="http://".$_SERVER["HTTP_HOST"];
		echo("<script type='text/javascript'> alert('Submitted information is not legal!'); location.href='$reurl'; </script>");
		die("Parameter Error！");
	}
	$string = trim($string);
	if($id!=""){
	if(!is_numeric($id)){
	$reurl="http://".$_SERVER["HTTP_HOST"];
	echo("<script type='text/javascript'> alert('Parameter Error！'); location.href='$reurl'; </script>");
	die("Parameter Error！");
	}}
	if($class1!=""){
	if(!is_numeric($class1)){
	$reurl="http://".$_SERVER["HTTP_HOST"];
	echo("<script type='text/javascript'> alert('Parameter Error！'); location.href='$reurl'; </script>");
	die("Parameter Error！");
	}}
	if($class2!=""){
	if(!is_numeric($class2)){
	$reurl="http://".$_SERVER["HTTP_HOST"];
	echo("<script type='text/javascript'> alert('Parameter Error！'); location.href='$reurl'; </script>");
	die("Parameter Error！");
	}}
	if($class3!=""){
	if(!is_numeric($class3)){
	$reurl="http://".$_SERVER["HTTP_HOST"];
	echo("<script type='text/javascript'> alert('Parameter Error！'); location.href='$reurl'; </script>");
	die("Parameter Error！");
	}}   
    $string = str_replace("%", "\%", $string);     //      
	return $string;
}
//inject防注入
function inject_check($sql_str) {
  if(strtoupper($sql_str)=="UPDATETIME" ){
  return eregi('select|insert|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);   
  }else{	
  return eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);   
  }     
}
//安全过滤函数
function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}
//安全过滤函数
function safe_html($str){
	if(empty($str)){return;}
	$str=preg_replace('/select|insert | update | and | in | on | left | joins | delete |\%|\=|\/\*|\*|\.\.\/|\.\/| union | from | where | group | into |load_file
|outfile/','',$str);
	return htmlspecialchars($str);
}

//检查外部传递的值并转义
function _RunMagicQuotes(&$svar)
{
    if(!get_magic_quotes_gpc())
    {
        if(is_array($svar))
        {
            foreach($svar as $_k => $_v) $svar[$_k] = _RunMagicQuotes($_v);
        }
        else
        {
            if(strlen($svar)>0 && preg_match('#^(cfg_|GLOBALS|_GET|_POST|_COOKIE)#',$svar) )
            {
              exit('不允许请求的变量!');
            }

            $svar = addslashes($svar);
        }
    }
    return $svar;
}
//直接应用变量名称替代
foreach(array('_GET','_POST','_COOKIE') as $_request)
{
	foreach($$_request as $_k => $_v) ${$_k} = _RunMagicQuotes($_v);
}
/**
 * 后台功能函数
 *  
 * 
 */
 
//验证码获取函数
function GetCkVdValue()
{
	@session_start();
	return isset($_SESSION['ckstr']) ? $_SESSION['ckstr'] : '';
}
//验证码重置函数
function ResetVdValue()
{
	@session_start();
	$_SESSION['ckstr'] = '';
	$_SESSION['ckstr_last'] = '';
}
//判断身份
function showsf($sf){
	if($sf==0){
		$str="超级管理员";
	}	
	if($sf==1){
		$str="高级管理员";
	}
	if($sf==2){
		$str="普通管理员";
	}
	return $str;
}
//判断状态
function State($flag){
	switch($flag){
		case 'Y':$str="通过审核";
		case 'N':$str="未通过审核";
	return $str;
	}
}


?>
