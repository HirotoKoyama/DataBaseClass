<?php
//フォームからの値をそれぞれ変数に代入
//$name = $_POST['name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$hashpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dsn = "mysql:host=localhost; dbname=practice; charset=utf8";
$dbuser = "root";
$dbpass = "centos";
try {
    $dbh = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

//フォームに入力されたnameがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE user_name = :user_name";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_name', $user_name);
$stmt->execute();
$member = $stmt->fetch();
if ($member['user_name'] === $user_name) {
    $msg = '同じユーザーネームが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO users(user_name, password) VALUES (:user_name, :hashpass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_name', $user_name);
    $stmt->bindValue(':hashpass', $hashpass);
    $stmt->execute();
    $cmd = "sudo useradd $user_name";
    exec($cmd);
    $cmd2 = "echo $user_name:$password | sudo /usr/sbin/chpasswd";
    exec($cmd2);
    $msg = 'ユーザー登録が完了しました';
    $link = '<a href="login_form.php">ログインページ</a>';
}
?>
<?php echo $msg; ?>
<?php echo $link; ?>
