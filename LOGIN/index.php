<?php
session_start();
$user_name = $_SESSION['user_name'];
if (isset($_SESSION['user_id'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($user_name, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<br /><a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<br /><a href="login_form.php">ログイン</a>';
}

?>
<?php echo $msg; ?>
<?php echo $link; ?>
