<?php
  require_once('dbconnect.php');

  include('_parts/_header.php');

?>

      <main>
        <h2>Practice</h2>
        <pre>
          <?php


          $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
          $statement->execute(array($_POST['memo'], $_POST['id']));
          ?>
          <p>メモの内容を変更しました</p>
        </pre>

<?php
  include('_parts/_footer.php');