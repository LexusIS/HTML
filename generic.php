<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
session_start();
?>
<?php

if(isset($_GET["id"])){
    $i = $_GET["id"];
}else{
    $ERRFlg = 1;
    $ERRMsg .= "ファイル不正アクセス";
    $i = "データが受信できませんでした";
}

include("mysqlenv.php");

//  MySQLとの接続開始
if(!$Link = mysqli_connect
            ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー<br />" . 
    mysqli_connect_error());
}

//  クエリー送信(文字コード)
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        $SQL);
}

//  MySQLデータベース選択
if(!mysqli_select_db($Link,$DB)){
  //  MySQLデータベース選択失敗
  exit("MySQLデータベース選択エラー<br />" .
        $DB);
}
//  クエリー送信(選択クエリー)

//$SQL = "UPDATE  `trendstyle` SET  `f_yobi` =  '$count' WHERE  `trendstyle`.`f_article_id` = $i ";
$SQL = "select * from trendstyle ";
$result = mysql_query("UPDATE trendstyle SET f_yobi = f_yobi, f_yobi = f_yobi + 1 WHERE f_article_id = $i;");


if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（全件配列に格納）
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry[] = $Row;
}
/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["shid"]
$RowAry[0]["shname"]
$RowAry[0]["shprice"]
$RowAry[0]["shimg"]

$RowAry[1]["shid"]
$RowAry[1]["shname"]
$RowAry[1]["shprice"]
$RowAry[1]["shimg"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

if(!isset($_GET["p"])){
  $page = 1;
}else{
  $page = $_GET["p"];
}

?>


<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic-TRENDSTYLE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="images/TRENDSTYLElogo.png">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/TRENDSTYLElogo.png">
		<meta name="theme-color" content="#000">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Massively</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php"><i class="fa fa-clock-o"></i>Time Line</a></li>
							<li class="active"><a href="#">Generic Page</a></li>
							<li><a href="search.php"><i class="fa fa-search"></i>search</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="article1.php" class="icon fas fa-edit"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date"><?php print $RowAry[$i -1]["f_date"]; ?></span>
									<h1><?php print $RowAry[$i -1]["f_title"]; ?></h1>
									<p><?php print $RowAry[$i -1]["f_genre"]; ?></p>
									<!--<p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
									facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
									amet nullam sed etiam veroeros.</p>-->
								</header>
								<div class="image main"><img src="./images/<?php print $RowAry[$i -1]["f_img1"]; ?>" alt="<?php print $RowAry_M[$i -1]["f_title"]; ?>"/></div>
								
								<p><?php print $RowAry[$i -1]["f_text"]; ?></p>
								
								<!--<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum sit amet, fergiat. Pellentesque in mi eu massa lacinia malesuada et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar mauris. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur sapien risus, commodo eget turpis at, elementum convallis enim turpis, lorem ipsum dolor sit amet nullam.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum.</p>-->
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<form method="post" action="form.php"><?php $name = ""; $email = ""; $message = "";?> 
								<div class="field">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" value="<?php print $name?>"/>
								</div>
								<div class="field">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" value="<?php print $email?>"/>
								</div>
								<div class="field">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="3" value="<?php print $message ?>"></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section class="alt">
								<h3>Address</h3>
								<p>愛知県名古屋市中村区 名駅4丁目27-1<br />
								スパイラルタワーズ 450-0002</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a href="#">090-6571-6874</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">crossroad721kouki@yahoo.co.jp</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="https://twitter.com/hondacar0721" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>