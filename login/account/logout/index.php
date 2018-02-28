<?
header('Content-Type:text/html; charset=UTF-8');
session_start();
unset($_SESSION['user']);
header('Location: ../login/');
exit();
?>
