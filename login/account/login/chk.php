<?
header('Content-Type:text/html; charset=UTF-8');
include('../../mysqlenv.php');

if(!isset($_POST['btn'])){
    header('Location: index.php');
    exit();
}

$id = $_POST['id'];
$pass = $_POST['pass'];
try{
   $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
   if($dbh == null){
       exit('DB接続失敗');
   }
   $dbh->query('set names utf8');
   $sql = " select * from user where id='".$id."' ";
   $stmt = $dbh->query($sql);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
}catch(PDOException $e){
   echo 'Error:'.$e->getMessage();
   die();
}
$dbh = null;

if($count != 0){
   if($result['pass'] == $pass){
       session_start();
       $_SESSION['user']['id'] = $result['id'];
       $_SESSION['user']['name'] = $result['name'];
       header('Location: ../../index.php');
       exit();
   }else{
       header('Location: index.php?err=1&id='.$id);
       exit();
   }
}else{
   header('Location: index.php?err=2&id='.$id);
   exit();
}
?>
