<?php
  require_once('dbconnect.php');

  include('_parts/_header.php');

?>

      <main>
        <h2>Practice</h2>
        <pre>
          <?php


            $id = $_REQUEST['id'];
            // $idが数字じゃない又は0以下にしてしまったときの処理
            if(!is_numeric($id) || $id <= 0) {
              print('1以上の数字で指定してください');
              exit();
            }

            $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
            $memos->execute(array($id));
            $memo = $memos->fetch();
            ?>
            <article>
              <pre><?php print($memo['memo']); ?></pre>

              <a href="update.php?id=<?php print($memo['id']); ?>">編集する</a> | 
              <a href="delete.php?id=<?php print($memo['id']); ?>">削除する</a> | 
            </article>
 <?php
  include('_parts/_footer.php');