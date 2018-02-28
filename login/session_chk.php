<?
header('Content-Type:text/html; charset=UTF-8');
session_start();
if(isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['name'];
}else{
    header('Location: account/login/');
}
?>
