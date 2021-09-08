<h4 class ='footer-h4'>Страницы:</h4>
<div class="flex--wrap">
  <?php
  for ($i = 0; $i < round($countPages / $getPages, PHP_ROUND_HALF_UP); $i++) {
  ?>
    <div class="list">
      <a href="?page=<?= $i ?>">
        <?= $i + 1 ?>
      </a>
    </div>
  <?php
  }
  ?>
</div>
</body>

</html>