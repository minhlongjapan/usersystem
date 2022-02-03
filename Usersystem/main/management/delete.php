<?php
  include_once('../connect.php');
  include_once('../session.php');
  checktime();
  
    if(isset($_POST['delete'])){
      $id = filter_input(INPUT_GET, 'id');


      
      if(isset($id)){
        $stmt = $pdo -> prepare('DELETE FROM user WHERE id = :id');
        $stmt -> execute(array(':id' => $id
        ));    
      } 
      header('location: edit.php?m=delete');
    }

  $stmt = $pdo -> prepare('SELECT * FROM user WHERE id = :id');
  $stmt -> execute(array(':id' => $_GET['id']));
  $db_users = 0;
  $db_users = $stmt -> fetch(PDO::FETCH_ASSOC);
?>



<link rel='stylesheet' href='../css/styles.css'>
<body>  
  <form class='styles' action="" method="POST" >
    <p> Email: <?php echo $db_users['Email'];?></p>
    <p> Password: <?php echo $db_users['Pass'];?></p>
    <p>本当に削除しますか？</p>
    <input type="submit" name="delete" value="Yes">
    <button><a href='edit.php' style='text-decoration: none'>No</button>

    <div class='info1'>
      <p><a href='user_home.php' style='text-decoration: none'>Home &emsp; <a href='../index.php' style='text-decoration: none'> Logout</p>
    </div>
  </form>
</body>