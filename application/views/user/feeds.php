<?php // after post.php // ?>

<div class="row">
  <h3>Status feeds</h3>
  <table class="table">
    <tr>
      <th>Post Content</th>
      <th>Time</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php foreach($news_feeds as $feeds => $value): ?>
    <tr>
      <td><?= $value['post']?></td>
      <td><?= timespan($value['time'], time(), 2)?></td>
      <td>
      <?php
        echo anchor('post/update/'.$value['post_id'], 'Edit', 'class="btn btn-default"');
      ?></td>
      <td>
      <?php
        echo anchor('post/delete/'.$value['post_id'], 'Delete', 'class="btn btn-default"');
      ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
