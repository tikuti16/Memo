<?php
try {
  // DB接続
  $db = new PDO('mysql:dbname=mydb;host=localhost;port=8889;charset=utf8',
  'root', 'root');
} catch(PDOException $e) {
  echo 'DB接続エラー：' . $e->getMessage();
}