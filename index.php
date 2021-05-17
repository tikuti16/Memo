<?php
  require_once('dbconnect.php');

  include('parts/header.php');

?>
      <main>
        <div class="btn create"><a href="input.php">メモを作成する</a></div>
        <div>
        <!-- ページネーション -->
          <?php
            if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
              $page = $_REQUEST['page'];
            } else {
              $page = 1;
            }
            $start = 5 * ($page - 1);

            $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?,5');
            // PARAM_INTで、数字で渡すようにする
            $memos->bindParam(1, $start, PDO::PARAM_INT);
            $memos->execute();
          ?>

        <!-- 記事 -->
          <article>
            <?php while($memo = $memos->fetch()): ?>
              <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?= htmlspecialchars(mb_substr($memo['memo'], 0, 50),ENT_QUOTES); ?></a></p>
              <time><?php print($memo['created_at']); ?></time>
              <hr>
            <?php endwhile; ?>
          </article>
        
        <!-- ページ移動 -->
          <nav>
            <div class="container">
              <div class="front_page">
                <?php if ($page >= 2): ?> 
                  <a href="index.php?page=<?php print($page-1); ?>">&lt; <?php print($page-1); ?>ページ目へ</a>
                <?php endif; ?>
              </div>
              <div class="next_page">
                <?php
                  $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
                  $count = $counts->fetch();
                  $max_page = ceil($count['cnt'] / 5);
                  if ($page < $max_page):
                ?>
                <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ &gt;</a>
                <?php endif; ?>
              </div>
            </div>
                  </nav>
        </div>
<?php
  include('parts/footer.php');