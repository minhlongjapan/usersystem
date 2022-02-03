<!-- ログインユーザーの認証 -->
<link rel='stylesheet' href='../css/styles.css'> 
<?php
  session_start();
  include_once('../connect.php');
  
  if(filter_input(INPUT_POST,'login')){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $post_array = [$email, $pass];
    $msg = '';

    //ユーザー保存、一日過ぎたら削除
    if (isset($_POST['check'])){
      setcookie('email', $email, time()+(24*60*60));
      setcookie('pass', $pass, time()+(24*60*60));
    }
    //ユーザー存在チェック
    if(($email != '') && ($pass != '')){
      $stmt = $pdo -> query('SELECT * FROM user');
      $items = $stmt -> fetchAll();

      foreach($items as $item):
        $db_email = $item['Email'];
        $db_pass = $item['Pass'];
        $db_array = [$db_email,$db_pass];
        if($post_array == $db_array){
          $msg = 'ログインできました';
          break;
        }
        //ユーザーチェックNG
        if(($email == $db_email) && ($pass !== $db_pass)){
          $msg = 'パスワードが間違いました';
        }
        //ユーザーチェックNG
        if($email !== $db_email){
          $msg = 'メールアドレスが間違いました';
        }
      endforeach;
      
      //ユーザーチェックOK
      if($msg == 'ログインできました'){
          $_SESSION['email'] = $email;

          header('location: ../management/user_home.php');
      }

      //戻る
      else{
        echo '<form class="styles">';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo $msg . '<br>'; 
        echo '<button><a href="login_form.php" style="text-decoration: none">戻る</button>';
        echo '</form>';
      }
    }
    //戻る
    else{
      echo '<form class="styles">';
      echo '<br>';
      echo '<br>';
      echo '<br>';
      echo 'メールとパスワードを入力してください' . '<br>'; 
      echo '<button><a href="login_form.php" style="text-decoration: none">戻る</button>';
      echo '</form>';
    }
  }
?>



  