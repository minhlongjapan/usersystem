<?php
  session_start();
  if (isset($_SESSION['email'])){
    unset($_SESSION['email']);
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理</title>
  <link rel='stylesheet' href='css/styles.css'>
</head>
<body>
  <form class='styles'>
    <p>ユーザーデータベース管理<p><br>
    <button> <a href='login/login_form.php' style='text-decoration: none'> ログイン </button>
    <button> <a href='new_acount/new_form.php' style='text-decoration: none'> 新規登録 </button>
</form>
</body>
</html>