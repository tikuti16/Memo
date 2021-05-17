<?php
  require_once('dbconnect.php');

  include('_parts/_header.php');

?>

      <main>
        <h2>Practice</h2>
        <pre>
          <?php

 
          if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $statement = $db->prepare('DELETE FROM memos WHERE id=?');
            $statement->execute(array($id));
          }
          ?>
          <p>メモを削除しました</p>
        </pre>
        
<?php
  include('_parts/_footer.php');