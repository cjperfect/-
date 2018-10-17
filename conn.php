<?php
	$host="localhost";
	$dbname="news";
	$user="root";
	$password="";
	$charset="utf8";
	
	$pdo=new PDO("mysql:host=$host; dbname=$dbname","$user","$password");
	$pdo->query("set names $charset");
?>