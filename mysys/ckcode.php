<?php 
	session_start();
	$img=imagecreatetruecolor(100,32);
	$black=imagecolorallocate($img,0,0,0);
	$color=imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
	imagefill($img,0,0,$black);
	$arr=array_merge(range(0,9),range('a','z'),range('A','Z'));
	shuffle($arr);
	$ckcode=join(' ',array_slice($arr,0,4));
	$_SESSION['ckcode']=$ckcode;
	for($i=0;$i<200;$i++){
		imagesetpixel($img,rand(0,100),rand(0,50),$color);
		}
	imagettftext($img,20,0,5,25,$color,'ms.ttf',$ckcode);
	header('Content-type:image/jpeg');
	imagejpeg($img);
	imagedestroy($img);
?>