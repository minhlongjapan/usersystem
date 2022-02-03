<!-- 新規登録のユーザーフォーム -->


<?php
  include_once('../session.php');
  checktime();

  include('../connect.php');
  $msg = '';  
  
  if(filter_input(INPUT_POST, 'newacount')){
    if(($_POST['email'] == '') || ($_POST['pass'] == '')){
      $msg = 'メールとパスワードを入力してください！';
    }

    else { 
      //新しいユーザー作成
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      try{
        $items = [$email,$pass];
        $stmt = $pdo -> prepare(
          'INSERT INTO user(Email, Pass) VALUES (?, ?)');
        $stmt -> execute($items);
      }
      catch (PDOException $e) {
        echo $e -> getMessage() . PHP_EOL;
        exit;
      }
    $msg = 'ユーザーデータベース管理のアカウントを登録しました！<br><br>';  
  }  
}
?>

<link rel='stylesheet' href='../css/styles.css'>
<form class='styles' method='POST' action=''>
  <p>新しいユーザーを作成する</p>
  <label>Email:</label>
  <input type='email' value='' name='email' size='30'
    placeholder='メールアドレスを入力してください'><br>
  <label>Password:</label>
  <input type='password' value='' name='pass' size='25'
    placeholder='パスワードを入力してください'><br>
  <p><?= $msg;?></p>
  <input type='submit' name='newacount' value='作成'>
  <button><a href='user_home.php' style='text-decoration: none'>戻る</button>
</form><br>