<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
//  データの受信（今回はエラー処理なし）
$ERRFlg = 0;
$ERRMsg = "";
/************************
//  データの受信（無条件）
$name = $_POST["txtName"];
************************/
//  データの受信（受信有無確認）
if(isset($_POST["id"])){
  //  受信できた
  $name = $_POST["title"];
  $id = $_POST["id"];
  $date = $_POST["date"];
  $genre = $_POST["genre"];
  $img1 = $_POST["img1"];
  $img2 = $_POST["img2"];
  $yobi = $_POST["yobi"];
  $URL = $_POST["URL"];
  $txt = $_POST["txt"];
}else{
  //  受信できなかった
  $ERRFlg = 1;
  $ERRMsg .= "不正アクセスを検知";
  $name = "タイトルのデータNG";
  $id = "記事のデータNG";
  $date = "日付のデータNG";
  $genre = "ジャンルのデータNG";
  $img1 = "画像No.1のデータNG";
  $img2 = "画像No.2のデータNG";
  $yobi = "備考のデータNG";
  $URL = "URLデータNG";
  $txt = "txtデータNG";
}
//  MySQL定数の組み込み
include("mysqlenv.php");

//  MySQLへの接続
if(!$Link = mysqli_connect
       ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー" . mysqli_connect_error());
}

//  MySQLへの文字コード指定
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー" . $SQL);
}

//  MySQLデータベース指定
if(!mysqli_select_db($Link,$DB)){
  exit("MySQLDB選択エラー" . $DB);
}
/***************************************
  使用するMySQL：localhost
  使用するDB名：2017wp32db

  部署テーブル：t_busho
  部署ID：buid char(1) primary key
  部署名：buname varchar(10)
****************************************/

/***************************************
  部署テーブルにデータを追加するSQL文
  
  insert into t_busho values
    ('0','総務部');
  
****************************************/
$SQL = "insert into trendstyle (f_article_id,f_date,f_title,f_text,f_genre,f_img1,f_img2,f_yobi,f_url) values";
$SQL .= " ('" . $id . "','" . $date . "','" . $name . "','" . $txt . "','" . $genre . "', '" . $img1 . "','" . $img2 . "','" . $yobi . "','" . $URL . "')";
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー<br />" . 
      mysqli_error($Link) . "<br />" .$SQL);
}



if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
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
		<title>Articleの追加完了</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
						<a href="index.php" class="logo">HO<i class="fa fa-home"></i>E</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php"><i class="fa fa-home"></i>Time Line</a></li>
							<li><a href="search.php"><i class="fa fa-search"></i>search</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1>登録完了</h1>
									<h1><?php print $name; ?></h1>
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
									<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
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