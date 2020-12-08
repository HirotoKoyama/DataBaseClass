<?php
session_start();
$user_name = $_POST['user_name'];
$dsn = "mysql:host=localhost; dbname=practice; charset=utf8";
$dbuser = "root";
$dbpass = "centos";
try {
    $dbh = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE user_name = :user_name";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_name', $user_name);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['user_id'] = $member['user_id'];
    $_SESSION['user_name'] = $member['user_name'];
    $msg = 'ログインしました。<br />';
    $link = '<a href="index.php">ホーム</a>';
} else {
    $msg = 'ユーザーネームが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>

<?php echo $msg;?>
<?php echo $link; ?>
