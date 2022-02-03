<!-- ログインフォーム画面 -->

<link rel='stylesheet' href='../css/styles.css'>

<form class='login_styles' method='POST' action='login.php'>
  <p>Welcome...!!!!!</p>
  <label> Email:</label>
  <input type='text' value='<?php if (isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>' name='email' size='30'
    placeholder='メールアドレスを入力してください'><br>

  <label> Password:</label>
  <input type='password' value='<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>' name='pass' size='25'
    placeholder='パスワードを入力してください'><br>

  <input type='checkbox' value=''<?php if (isset($_COOKIE['check'])) echo 'checked'; ?>'' name='check'>
  <label>ユーザー保存する</label><br><br>
  <input type='submit' name='login' value='ログイン'>
  <button><a href='../index.php' style='text-decoration: none'>戻る</button>
</form>
  