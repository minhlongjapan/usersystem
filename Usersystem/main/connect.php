<!-- データベースに接続 -->
<?php
  $pdo = new PDO(
    'mysql:host=localhost; dbname=minhlong; charset=utf8mb4', 
    'root',
    '',
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => FALSE
    ]
    );
  ?>
