
<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
//  データの受信(今回は無条件)
$id = $_POST["txt"];

//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
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
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  $RowAry[] = $Row;
}

//  更新クエリーの発行
/**************************************
  社員テーブル:t_shain
  社員ID：shid varchar(50) primary key
  社員名：shname varchar(20)
  パスワード：shpass varchar(20)
  社員所属部署ID：shbuid char(1)
***************************************/
/**************************************
社員テーブルの中身を抜き出すSQL文

select t_shain.shid,t_shain.shname,
  t_shain.shpass,t_busho.buname
    from t_shain inner join t_busho
      on t_shain.shbuid = t_busho.buid
        where t_shain.shid = 'XXXXX'
**************************************/

//  クエリー送信(選択クエリー)
$SQL = "SELECT * FROM trendstyle WHERE f_text LIKE "."'%".$id."%'"." order by f_article_id;";

if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（先頭行）
$Row = mysqli_fetch_array($SqlRes);

/*********************************
抜き出された連想配列

$Row["shid"]
$Row["shname"]
$Row["shpass"]
$Row["buname"]
**********************************/

//  抜き出されたレコード件数を求める
$NumRows = mysqli_num_rows($SqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes);

//  MySQLとの切断
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
		<title>Searche-TRENDSTYLE</title>
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
							<li><a href="article1.php" class="icon fas fa-edit"><span class="label">edit</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1><i class="fa fa-search"></i><br />
									search</h1>
								</header>

								<!-- Text stuff -->
									<p></p>
									<hr />
									<div class="table-wrapper">
									</div>
									<header>
										<?php if($NumRows == 0): ?>
										「<?= $id ?>」は検出できません。
										<?php else: ?>
										<h2><a href="generic.php?id=<?= $Row["f_article_id"] ?>" class="image main" target="_blank"><?= $Row["f_title"] ?></a></h2>
										<p><?= $Row["f_genre"] ?></p>
										<p><a href="generic.php?id=<?= $Row["f_article_id"] ?>" class="image main" target="_blank">
											<img src="./images/<?= $Row["f_img1"] ?>" /></a></p>
										<p><?php echo $Row["f_text"] = mb_substr($Row["f_text"], 0, 83); ?></p>
											<a class="button" href="generic.php?id=<?= $Row["f_article_id"] ?>" target="_blank">Full Story</a>
										<?php endif; ?>
									</header>
									<hr />
									
								<!-- Lists -->
									


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