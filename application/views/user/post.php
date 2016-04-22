<div class="container">
  <div class="row">
    <h3>Post something</h3>
    <div class="form-group">
    <?php echo form_open('dashboard'); ?>
    <?php echo validation_errors(); ?>
    <?php

      $form_data = array(
        'class' => 'form-control',
        'placeholder' => "what's on your mind?",
        'name' => 'post_message'
      );
      echo form_textarea($form_data);
    ?>
    <?php echo form_submit(array('class' => 'btn btn-default', 'value' => 'Submit post')); ?>

    <?php echo form_close(); ?>
  </div>

