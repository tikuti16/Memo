<?php
  require_once('dbconnect.php');

  include('_parts/_header.php');

?>

      <main>
        <h2>Practice</h2>
        <pre>
          <?php

 
          // prepareで、SQLを実行する。NOW()は今の時刻を受け取る
          $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
          // ?の部分に入るものを、postで送信されたものをPOSTで受け取る
          $statement->bindParam(1, $_POST['memo']);
          $statement->execute();
          echo 'メッセージが登録されました';

          ?>
        </pre>

<?php
  include('_parts/_footer.php');