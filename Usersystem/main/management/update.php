<?php
  include_once('../connect.php');
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: ../index.php');
  }
  try{
    if(isset($_POST['change'])){
      $email = filter_input(INPUT_POST, 'email');
      $pass = filter_input(INPUT_POST, 'pass');
      $id = filter_input(INPUT_GET, 'id');
      
      if(($email !== '') && ($pass !== '')){
        $stmt = $pdo -> prepare('UPDATE user SET 
          Email = :email,
          Pass = :pass WHERE id = :id');
        $stmt -> execute(array(
          ':email' => $email,
          ':pass' => $pass,
          ':id' => $id
        ));    
      } 
      header('location: edit.php?m=change');
    }
  } catch(Exception $e){
    echo 'NG' . $e -> getMessage();
    exit;
  }

  $stmt = $pdo -> prepare('SELECT * FROM user WHERE id = :id');
  $stmt -> execute(array(':id' => $_GET['id']));
  $db_users = 0;
  $db_users = $stmt -> fetch(PDO::FETCH_ASSOC);
?>



<link rel='stylesheet' href='../css/styles.css'>
<body>
  <form class='styles' action="" method="POST" >
    <p> Email: <input type="text" name="email" value="<?php echo $db_users['Email'];?>" size='30'></p>
    <p> Password: <input type="text" name="pass" value="<?php echo $db_users['Pass'];?>" size='25'></p>
    <input type="submit" name="change" value="Change">
    <button><a href='edit.php' style='text-decoration: none'>Back</button>

    <div class='info1'>
      <p><a href='user_home.php' style='text-decoration: none'>Home &emsp; <a href='../index.php' style='text-decoration: none'> Logout</p>
    </div>
  </form>
</body>