<?
header('Content-Type:text/html; charset=UTF-8');
$msg = $id = '';

if(isset($_GET['err'])){
    $err = $_GET['err'];
    $id = $_GET['id'];
    if($err == '1'){
        $msg = 'パスワードに誤りがあります。';
    }else if($err == '2'){
        $msg = 'IDに誤りがあります。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>login sample</title>
</head>
<body>
    <?= $msg ?>
    <form action="chk.php" method="post">
        <input type="text" name="id" value="<?= $id ?>" placeholder="ID" required>
        <input type="password" name="pass" placeholder="パスワード" required>
        <input type="submit" name="btn" value="ログイン">
    </form>
</body>
</html>
