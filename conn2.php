<?php
	$host="121.32.236.151";
	$dbname="db8051670";
	$user="db8051670";
	$password="Hjf990911";
	$charset="utf8";
	
	$pdo=new PDO("mysql:host=$host; dbname=$dbname","$user","$password");
	$pdo->query("set names $charset");
?>