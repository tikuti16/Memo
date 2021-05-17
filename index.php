<?php
  require_once('dbconnect.php');

  include('_parts/_header.php');

?>

      <main>
        <div><a href="input.php">メモを作成する</a></div>
        <pre>
          <?php
            require('dbconnect.php');

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

          <article>
            <?php while($memo = $memos->fetch()): ?>
              <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
              <time><?php print($memo['created_at']); ?></time>
              <hr>
            <?php endwhile; ?>
            
            <?php if ($page >= 2): ?> 
              <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
            <?php endif; ?>
             | 
            <?php
              $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
              $count = $counts->fetch();
              $max_page = ceil($count['cnt'] / 5);
              if ($page < $max_page):
            ?>
            <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
            <?php endif; ?>
          </article>
        </pre>
<?php
  include('_parts/_footer.php');