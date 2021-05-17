<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>

      <main>
        <div class="window">
          <?php
          if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $statement = $db->prepare('DELETE FROM memos WHERE id=?');
            $statement->execute(array($id));
          }
          ?>
          <p>メモを削除しました</p>
        </div>
        
<?php
  include('parts/footer.php');