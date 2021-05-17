<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>

      <main>

        <div class="window">
          <?php 
          // prepareで、SQLを実行する。NOW()は今の時刻を受け取る
          $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
          // ?の部分に入るものを、postで送信されたものをPOSTで受け取る
          $statement->bindParam(1, $_POST['memo']);
          $statement->execute();
          echo 'メッセージが登録されました';
          ?>
        </div>

<?php
  include('parts/footer.php');