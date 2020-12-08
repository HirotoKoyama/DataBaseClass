<?php
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );
?>
<h1>ログインページ</h1>
<form action="login.php" method="post">
<div>
    <label>ユーザーネーム：<label>
    <input type="text" name="user_name" required>
</div>
<div>
    <label>パスワード：<label>
    <input type="password" name="password" required>
</div>
<input type="submit" value="ログイン">
<p>新規登録は<a href="signup.php">こちら</a></p>
</form>
