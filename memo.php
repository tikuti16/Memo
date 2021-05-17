<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>

      <main>

        
        <!-- idの取得 -->
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
            <!-- メモの詳細 -->
              <div class="window">
                <?= htmlspecialchars($memo['memo'], ENT_QUOTES); ?>
              </div>
              <div class="btn-wrapper">
                <div class="edit"><a href="update.php?id=<?php print($memo['id']); ?>">編集する</a></div> 
                <div class="del"><a href="delete.php?id=<?php print($memo['id']); ?>">削除する</a></div>
              </div>
            <?php
  include('parts/footer.php');