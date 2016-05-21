<div class="container">
  <div class="page-header">
     <h3>Search Result for "<?php echo html_escape($this->input->get('_q')); ?>" <small><span class="label label-default">{elapsed_time} Seconds</span></small></h3>
  </div>
  <div class="list-group">
  <?php if(!empty($search_result)): ?>
    <?php echo empty($search_result); ?>
    <?php foreach($search_result as $value): ?>
    <div class="list-group-item">
      <span class="badge"><?= $value['UID'];?></span>
      <h4 class="list-group-item-heading"><?= $value['USN']; ?></h4>
      <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
      <hr />
    </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="jumbotron">
       <h3>Sorry, no result were found.</h3>
       <blockquote>
        <p>Make sure all words are spelled correctly.</p>
        <p>Try different keywords.</p>
        <p>Try more general keywords.</p>
        <p>Try fewer keywords.</p>
      </blockquote>
    </div>
  <?php endif; ?>
  </div>
</div>
