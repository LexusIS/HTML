<?php
//MySQL接続情報定義
if($_SERVER['HTTP_HOST'] == 'localhost:1024'){
	$HOST = "localhost";
	$USER = "root";
	$PASS = "0000";
	$DB = "TRENDSTYLE";
}else{
	$HOST = 'mysql127.phy.lolipop.lan';
	$USER = 'LAA0932943';
	$PASS = '0000';
	$DB = 'LAA0932943-trendstyle';
}
?>