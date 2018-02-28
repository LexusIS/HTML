<?
header('Content-Type:text/html; charset=UTF-8');
include('session_chk.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>login sample</title>
</head>
<body>
    <?php if($id != ''): ?>
        ようこそ<?= $name ?>さん
        <?php print_r($_SESSION['user']); ?>
        <a href="account/logout/">ログアウト</a>
    <?php endif; ?>
</body>
</html>
