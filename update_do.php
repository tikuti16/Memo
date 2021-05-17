<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>

      <main>
        <div class="window">
          <?php
          $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
          $statement->execute(array($_POST['memo'], $_POST['id']));
          ?>
          <p>メモの内容を変更しました</p>
        </div>

<?php
  include('parts/footer.php');