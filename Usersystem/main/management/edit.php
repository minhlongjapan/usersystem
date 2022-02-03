<?php
  include_once('../connect.php');
  include_once('../session.php');
  checktime();

  
  $msg = '';
  $stt = filter_input(INPUT_GET,'m');
  if($stt == 'change'){
    $msg = 'ユーザーを変更されました';
  }
  if($stt == 'delete'){
    $msg = 'ユーザーを削除されました';
  }

  $stmt = $pdo -> query('SELECT * FROM user');
  $db_users = $stmt -> fetchAll();
  function h($str) {
    return htmlspecialchars($str);
  }
?>
<link rel='stylesheet' href='../css/styles.css'>
<div class='styles'>
  <p><?=$msg?></p>
  <table class='edit_info' border='1'>
    <tr>
      <th>Email</th>
      <th>Pass</th>
      <th colspan='2'>Action</th>
    </tr>
    <?php foreach ($db_users as $row): ?>
    <tr>
      <td> <?= h($row['Email']); ?></td>
      <td> <?= h($row['Pass']); ?></td>
      <td>
        <a href='update.php?id=<?= h($row['id']); ?>' style='text-decoration: none'>Update
      </td>
      <td>
        <a href='delete.php?id=<?= h($row['id']); ?>' style='text-decoration: none'>Delete
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
  <div class='info1'>
    <p><a href='user_home.php' style='text-decoration: none'>Home &emsp; <a href='../index.php' style='text-decoration: none'> Logout</p>
   </div>
</div>