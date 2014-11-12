<?php if ($article->categories() != ''): ?> <em>gepost in</em>
  <ul class="tags">
    <?php foreach(str::split($article->categories()) as $cat): ?>
       <li><a href="<?php echo url('categorie:' . urlencode($cat)) ?>"><?php echo $cat; ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>
