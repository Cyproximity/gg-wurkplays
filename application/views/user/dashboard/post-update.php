<div class="container">
  <div class="row">
  <h3>Edit this post</h3>
  <?php echo form_open(); ?>
    <?php echo validation_errors(); ?>
    <?php

      $form_data = array(
        'class' => 'form-control',
        'value' => $post_message,
        'name' => 'post_message'
      );
      echo form_textarea($form_data);
    ?>
    <hr />
    <?php echo anchor('/dashboard/', 'Cancel', 'class="btn btn-default"'); ?>

    <?php echo form_submit(array('class' => 'btn btn-default', 'value' => 'Update post')); ?>
    <?php echo form_close(); ?>

  </div>
</div>
