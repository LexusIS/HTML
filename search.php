
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Search-TRENDSTYLE</title>
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
									<h1><i class="fa fa-search"></i><br />
									search</h1>
								</header>

								<!-- Text stuff -->
									<p></p>
									<hr />
									<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<form action="searchexe.php" method="post">
											<th>&nbsp;</th>
											<th><input type="text" name="txt" class="button fit" placeholder="記事を検索"/></th>
											<th><input type="submit" value="search" class="button special"/></th></form>
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