<?php	header("Content-Type:text/html;charset=utf-8");

/*
**************************
(C)2010-2012 hbxnseo.com
update: 2012-8-28 13:47:05
person: Feng
**************************
*/

define('hbxnseo_INC', preg_replace("/[\/\\\\]{1,}/", '/', dirname(__FILE__)));
define('hbxnseo_ROOT', preg_replace("/[\/\\\\]{1,}/", '/', substr(hbxnseo_INC, 0, -8)));
define('hbxnseo_DATA', hbxnseo_ROOT.'/database');
define('hbxnseo_UPLOAD', hbxnseo_ROOT.'/uploads');
define('hbxnseo_BACKUP', hbxnseo_DATA);
define('IN_hbxnseo', TRUE); //发放登入牌



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


//Session保存路径
$sess_savepath = hbxnseo_DATA.'/sessions/';
if(is_writable($sess_savepath) && is_readable($sess_savepath))
{
	session_save_path($sess_savepath);
}


//上传文件保存路径
$cfg_image_dir = hbxnseo_UPLOAD.'uploads/image';
$cfg_soft_dir  = hbxnseo_UPLOAD.'uploads/soft';
$cfg_media_dir = hbxnseo_UPLOAD.'uploads/media';


//系统版本号
//$cfg_version = file_get_contents(hbxnseo_DATA.'/update/version.txt');


//全局配置文件
require_once(hbxnseo_INC.'/../../../webconfig.php');


//全局常用函数
require_once(hbxnseo_INC.'/common.func.php');


//引入数据库连接
require_once(hbxnseo_INC.'/../../../conn.php');


//引入数据库类
require_once(hbxnseo_INC.'/mysqli.class.php');




?>