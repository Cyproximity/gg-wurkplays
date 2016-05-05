<div class="container">
  <div class="row">
    <h3>Post something</h3>
    <div class="form-group">
    <div id="notification"></div>
    <form>
    <?php

      $form_data = array(
        'class' => 'form-control',
        'id'    => 'posted_status',
        'placeholder' => "what's on your mind?",
        'name' => 'post_message'
      );
      echo form_textarea($form_data);
    ?>
    <hr />
    <?php echo form_button(array('class' => 'btn btn-default', 'value' => 'Submit post', 'id' => 'btn_post_status'), 'Post'); ?>

    <?php echo form_close(); ?>
  </div>

