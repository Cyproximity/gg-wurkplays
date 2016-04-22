<?php // before post.php // ?>

<div class="row">
    <h3>Status feeds</h3>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <?php foreach($news_feeds as $feeds => $value): ?>
      <div class="row">
        <h3><?= $value['post']?></h3>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
