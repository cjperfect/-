<?php

/*
**************************
(C)2010-2012 hbxnseo.com
update: 2012-8-28 13:43:34
person: Feng
**************************
*/


define('ADMIN_INC', preg_replace("/[\/\\\\]{1,}/", '/', dirname(__FILE__)));
define('ADMIN_ROOT', preg_replace("/[\/\\\\]{1,}/", '/', substr(ADMIN_INC, 0, -3)));
define('ADMIN_TEMP', ADMIN_ROOT.'/templets');
require_once(ADMIN_ROOT.'/include/common.inc.php');
require_once(ADMIN_INC.'/admin.func.php');
require_once(ADMIN_INC.'/page.class.php');


//是否允许在后台编辑PHP
$cfg_editfile = 'N';


//开启Session
session_start();


//检测是否登录
if(!isset($_SESSION['admin']) || !isset($_SESSION['adminlevel']) || !isset($_SESSION['logintime']))
{
}


//不允许直接通过路径访问
if(!isset($_SERVER["HTTP_REFERER"]) && substr(GetCurUrl(), -11) != 'default.php')
{
}
?>