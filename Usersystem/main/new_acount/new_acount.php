<!-- 新規登録のユーザー -->

<?php
  include('../connect.php');

  if(filter_input(INPUT_POST, 'newacount')){
    if(($_POST['email'] == '') || ($_POST['pass'] == '')){
      echo  'メールアドレスまたパスワードを入力してください！<br><br>';
      echo '<button><a href="new_form.php" style="text-decoration: none">戻る</button>';
    }
    else {
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
      }
    echo 'ユーザーデータベース管理のアカウントを登録しました！<br><br>';
?>

    <button> <a href='../login/login_form.php' style='text-decoration: none'> ログイン </button>
    <button> <a href='new_form.php' style='text-decoration: none'> 新規登録 </button>
  
<?php
    }
  }
?>
  