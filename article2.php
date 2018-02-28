<?php
//  処理部
//  エラーフラグ、メッセージ初期化
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
  //$img2 = "画像No.2のデータNG";
  //$yobi = "備考のデータNG";
  $URL = "URLデータNG";
  $txt = "txtデータNG";
}


//  入力内容チェック
//  未入力
if(strlen($id) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "記事番号が入力されていません<br />";
}
if(mb_strlen($id) > 100){
  $ERRFlg = 1;
  $ERRMsg .= "記事番号が100桁を超えてます。<br />";
}
if(strlen($name) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "タイトルに未入力があります。<br />";
}
if(mb_strlen($name) > 50){
  $ERRFlg = 1;
  $ERRMsg .= "タイトルは50文字までです。<br />";
}
if(strlen($date) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "日付が入力されていません<br />";
}
if(strlen($name) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "タイトルに未入力があります。<br />";
}
if(mb_strlen($name) > 50){
  $ERRFlg = 1;
  $ERRMsg .= "タイトルは50文字までです。<br />";
}
if(strlen($genre) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "ジャンルが入力<br />";
}
if(mb_strlen($genre) > 20){
  $ERRFlg = 1;
  $ERRMsg .= "ジャンルは20文字までです。<br />";
}
if(strlen($img1) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "ジャンルが入力してない<br />";
}
if(strlen($img2) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "<br />";
}
if(mb_strlen($img1) > 220){
  $ERRFlg = 1;
  $ERRMsg .= "写真は220文字までです。<br />";
}
if(strlen($img1) == 0){
  $ERRFlg = 1;
  $ERRMsg .= "ジャンルが入力<br />";
}
if(mb_strlen($img1) > 220){
  $ERRFlg = 1;
  $ERRMsg .= "写真は220文字までです。<br />";
}



//  DB処理
if($ERRFlg == 0){
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
    部署テーブルから部署IDを指定し
    抜き出すSQL文
    
    select * from t_busho
       where buid = 'X';
    
  ****************************************/
$SQL = "select f_article_id from trendstyle";
$SQL .= " where f_article_id = '" .$id. "'";
  if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . 
        mysqli_error($Link) . "<br />" . $SQL);
  }

  $Row = mysqli_fetch_array($SqlRes);
  /***************************************
    抜き出された連想配列
    
    $Row["buid"];
    $Row["buname"];
  ****************************************/

  //  抜き出されたレコード数
  $NumRows = mysqli_num_rows($SqlRes);
  
  //  メモリの解放（select文の時だけ必要）
  mysqli_free_result($SqlRes);

  //  MySQLとの切断
  if(!mysqli_close($Link)){
    exit("MySQL切断エラー");
  }
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
		<title>Articleの追加確認</title>
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
									<span class="date"><?php print htmlspecialchars($date); ?></span>
									<p name="id"><?php print htmlspecialchars($id); ?></p>
									<h1 name="title"><?php print htmlspecialchars($name); ?></h1>
									
									<p name="genre"><?php print htmlspecialchars($genre); ?></p>
								</header>
								<div class="image main" name="img1"><img src="images/<?php print $img1; ?>" alt="<?php print $name; ?>" /><br><?php print htmlspecialchars($img1);?></div>
								<div class="image main" name="img2"><img src="images/<?php print $img2; ?>" alt="<?php print $name; ?>" /><br><?php print htmlspecialchars($img2);?></div>
								<a name="URL" href="<?php print $URL; ?>"><?php print htmlspecialchars ($URL); ?></a>
								<p name="yobi"><?php print htmlspecialchars ($yobi); ?></p>
								<p name="txt"><?php print htmlspecialchars($txt); ?></p>
							</section>
<form action="article3.php" method="post">
								<input type="hidden" name="id" value="<?php print $id; ?>" /><br />
								<input type="hidden" name="title" value="<?php print $name; ?>" /><br />
								<input type="hidden" name="date" value="<?php print $date; ?>" /><br />
								<input type="hidden" name="genre" value="<?php print $genre; ?>" /><br />
								<input type="hidden" name="img1" value="<?php print $img1; ?>" /><br />
								<input type="hidden" name="img2" value="<?php print $img2; ?>" /><br />
								<input type="hidden" name="yobi" value="<?php print $yobi; ?>" /><br />
								<input type="hidden" name="URL" value="<?php print $URL; ?>" /><br />
								<input type="hidden" name="txt" value="<?php print $txt; ?>" /><br />
								<input type="submit" value="確定" class="button special"/>
</form>
									
<form action="article1.php" method="post">
								<input type="hidden" name="id" value="<?php print $id; ?>" /><br />
								<input type="hidden" name="title" value="<?php print $name; ?>" /><br />
								<input type="hidden" name="date" value="<?php print $date; ?>" /><br />
								<input type="hidden" name="genre" value="<?php print $genre; ?>" /><br />
								<input type="hidden" name="img1" value="<?php print $img1; ?>" /><br />
								<input type="hidden" name="img2" value="<?php print $img2; ?>" /><br />
								<input type="hidden" name="yobi" value="<?php print $yobi; ?>" /><br />
								<input type="hidden" name="URL" value="<?php print $URL; ?>" /><br />
								<input type="hidden" name="txt" value="<?php print $txt; ?>" /><br />
								<input type="submit" value="戻る" class="button special"/>
</form>
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
								<p>1234 Somewhere Road #87257<br />
								Nashville, TN 00000-0000</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a href="#">(000) 000-0000</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">info@untitled.tld</a></p>
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