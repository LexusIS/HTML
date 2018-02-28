<?php if(isset($_POST["id"])){
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
  $name = "";
  $id = "";
  $date = "";
  $genre = "";
  $img1 = "";
  $img2 = "";
  $yobi = "";
  $URL = "";
  $txt = "";
} ?>

<?
header('Content-Type:text/html; charset=UTF-8');
include('login/session_chk.php');
?>

<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Articleの追加</title>
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

<h3>Alternate</h3>
<div class="table-wrapper">
	<table class="alt">
		<thead>
			<tr>
				<th>アカウントID</th>
				<th>管理者名</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody><?php if($id != ''): ?>
			<tr>
				<td><?= $name ?></td>
				<td><?php print_r($_SESSION['user']); ?></td>
				<td><a href="account/logout/">ログアウト</a></td>
			</tr>
			<tr>
				<td>Item 2</td>
				<td>Vis ac commodo adipiscing arcu aliquet.</td>
				<td>19.99</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2"></td>
				<td>100.00</td>
			</tr>
		</tfoot>
	</table>
</div>
						
						<!-- Post -->
							<section class="post">
								<header class="major">
									<h1><i class="fa fa-pencil"></i><br />
									Editor</h1>
								</header>

								<!-- Text stuff -->
									<p></p>
									<hr />
									<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<form action="article2.php" method="post">
											<th><input type="text" name="id" class="button fit" placeholder="記事の番号" value="<?php print $id ?>"/></th>
										</tr>
										<tr>
											<th><input type="date" name="date" class="button fit" placeholder="日付選択" value="<?php print $date ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="title" class="button fit" placeholder="記事タイトル" value="<?php print $name ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="genre" class="button fit" placeholder="ジャンル入力" value="<?php print $genre ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="img1" class="button fit" placeholder="画像1枚目" value="<?php print $img1 ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="img2" class="button fit" placeholder="画像2枚目(任意)" value="<?php print $img2 ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="yobi" class="button fit" placeholder="備考" value="<?php print $yobi ?>"/></th>
										</tr>
										<tr>
											<th><input type="text" name="URL" class="button fit" placeholder="関連URL(任意)" value="<?php print $URL ?>"/></th>
										</tr>
										<tr>
											<th><textarea name="txt" cols="30" rows="4" placeholder="記事の内容" class="fit" value="<?php print $txt ?>" /></textarea></th>
										</tr>
											<th><input type="submit" value="SUBMIT" class="button special"/></th>
											</form>
										</tr>
									</thead>
								</table>
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