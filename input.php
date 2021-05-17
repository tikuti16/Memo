<?php

  include('parts/header.php');

?>
      <main>

        <!-- フォーム -->
        <form action="input_do.php" method="post">
          <textarea name="memo" cols="50" rows="10" Placeholder="自由にメモを残してください"></textarea><br>
          <button type="submit">登録する</button>
        </form>

<?php
  include('parts/footer.php');