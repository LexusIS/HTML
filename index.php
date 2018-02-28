<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
include("mysqlenv.php");

if(!$Link = mysqli_connect
	($HOST,$USER,$PASS)){
	exit("MySQL接続エラー<br />" . 
	mysqli_connect_error());
}

$SQL = "set names utf8";

if(!mysqli_query($Link,$SQL)){
	exit("MySQLクエリー送信エラー<br />" .
	$SQL);
}

if(!mysqli_select_db($Link,$DB)){
	exit("MySQLデータベース選択エラー<br />" .
	$DB);
}

$SQL = "select * from trendstyle ";
if(!$SqlRes = mysqli_query($Link,$SQL)){
	exit("MySQLクエリー送信エラー<br />" .
	mysqli_error($Link) . "<br />" . $SQL);
}


while($Row = mysqli_fetch_array($SqlRes)){
	$RowAry[] = $Row;
}

$NumRows = mysqli_num_rows($SqlRes);
mysqli_free_result($SqlRes);

if(!mysqli_close($Link)){
	exit("MySQL切断エラー");
}





if(!isset($_GET["p"])){
	$page = 1;
}else{
	$page = $_GET["p"];
}

if($page == 1){
	$pprev = "Nothing";
}else{
	$pprev = $page - 1;
}
if(($page * 5) >= $NumRows){
	$pnext = "Nothing";
}else{
	$pnext = $page + 1;
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>TREND STYLE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="shortcut icon" href="images/TRENDSTYLElogo.png">
		<link rel="stylesheet" href="assets/css/main.css" />
		<meta name="theme-color" content="#000">
		<meta charset="utf-8" />

	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1><img src="images/TRENDSTYLElogo.png" width="100%" alt="TREND STYLE"></h1>
						<p>通販で出品したけど、なかなか売れない、なかなか知ってもらえない時に、この<a href="https://twitter.com/hondacar0721" target="_blank">@TRENDSTYLE</a>を活用するコトによって売上や自分の商品の認知度を高める事が出来ます。</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="#" class="logo">Massively</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="index.php"><i class="fa fa-clock-o"></i>Time Line</a></li>
							<li><a href="search.php"><i class="fa fa-search"></i>search</a></li>
						</ul>
						<ul class="icons">
							<li><a href="http://twitter.com/share?url=http://trendstyle.cutegirl.jp" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://trendstyle.cutegirl.jp" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="article1.php" class="icon fas fa-edit"><span class="label">edit</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">


									<span class="date"><?php print  $RowAry[$i= mt_rand(1,10)]["f_date"]; ?></span>
									<h2><a href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>"><?php print $RowAry[$i]["f_title"]; ?></a></h2>
									<p><?php print $RowAry[$i]["f_genre"]; ?></p>
								</header>
								<a href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>" class="image main"><img src="./images/<?php print $RowAry[$i]["f_img1"]; ?>" alt="<?php print $RowAry_M[$i]["f_title"]; ?>"/></a>
								<ul class="actions">
									<li><a class="button" href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>" >Full Story</a></li>
								</ul>
							</article>




						
						<!-- Posts -->
							<section class="posts">
							<?php $p=($page-1)*6; for($i=$p;$i<$NumRows && $i<$p+6;$i++){?>
							<?php /*$p=($page-1)*7; for($i=$p;$i<$NumRows && $i<$p+7;$i++){ */?>


							<article>
								<header>
									<span class="date"><?php print $RowAry[$i]["f_date"]; ?></span>
									<h2><a href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>" target="_blank"><?php print $RowAry[$i]["f_title"]; ?></a></h2>
								</header>
								<a href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>" class="image main" target="_blank"><img src="./images/<?php print $RowAry[$i]["f_img1"]; ?>" alt="<?php print $RowAry_M[$i]["f_title"]; ?>"/></a>
								<p><?php print $RowAry[$i]["f_genre"]; ?></p>
								<p><?php print $RowAry[$i]["f_text"] = mb_substr($RowAry[$i]["f_text"], 0, 85); ?></p>
								
								<ul class="actions">
									<li><a class="button" href="generic.php?id=<?php print $RowAry[$i]["f_article_id"]; ?>">Full Story</a></li>
								</ul>
							</article>


								<?php } ?>
							</section>

						<!-- Footer -->
							<footer>
								<div class="pagination">
									
									<?php if($pprev != "Nothing"){
									print "<a href=\"index.php?p=" . $pprev . "\" >Return</a>　　"; }
										if($pnext != "Nothing"){
									print "<a href=\"index.php?p=" . $pnext . "\" >NEXT</a>";}
									?>
									
									
								</div>
							</footer>

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