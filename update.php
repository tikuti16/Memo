<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>

      <main>
        <!-- 選択したデータの取得 -->
        <?php
         if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
            $memos->execute(array($id));
            $memo = $memos->fetch();
         }
        ?>
        <!-- 編集フォーム -->
        <form action="update_do.php" method="post">
          <input type="hidden" name="id" value="<?php print($id); ?>">
          <textarea name="memo" cols="50" rows="10"><?php print($memo['memo']); ?></textarea><br>
          <button type="submit">登録する</button>
        </form>

<?php
  include('parts/footer.php');