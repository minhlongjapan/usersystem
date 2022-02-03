<?php
  include_once('../session.php');
  include_once('../connect.php');
  
  checktime();
  $stmt = $pdo -> query('SELECT * FROM user');
  $db_users = $stmt -> fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理</title>
  <link rel='stylesheet' href='../css/styles.css'>
</head>
<body>
  <div class='styles'>
    <p><a href='create.php' style='text-decoration: none'>CREATE USER</p>
    <p><a href='read.php' style='text-decoration: none'>READ USER</p>
    <p><a href='edit.php' style='text-decoration: none'>EDIT USER</p>
    <p><a href='../index.php' style='text-decoration: none'>LOGOUT</p>
  </div>
</body>
</html>