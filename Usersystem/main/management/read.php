<?php
  include_once('../connect.php');
  include_once('../session.php');
  checktime();

  
  $stmt = $pdo -> query('SELECT * FROM user');
  $db_users = $stmt -> fetchAll();

  function h($str) {
    return htmlspecialchars($str);
  }
?>
<link rel='stylesheet' href='../css/styles.css'>
<div class='styles'>
  <br>
  <table class='info' border='1'>
    <tr>
      <th>Email</th>
      <th>Pass</th>
    </tr>
    <?php foreach ($db_users as $row): ?>
    <tr>
      <td> <?= h($row['Email']); ?></td>
      <td> <?= h($row['Pass']); ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
  <div class='info1'>
    <p><a href='user_home.php' style='text-decoration: none'>Home &emsp; <a href='edit.php' style='text-decoration: none'>Edit &emsp; <a href='../index.php' style='text-decoration: none'> Logout</p>
   </div>
</div>