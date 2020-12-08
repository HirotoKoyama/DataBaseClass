<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>
ログアウトしました。<br />
<a href="login_form.php">ログインへ</a>
