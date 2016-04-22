<div class="container">
  <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <h1>Login</h1>
      <p>Create an account here. <a href="<?php echo site_url('/register'); ?>" >Register</a></p>
      <hr />
        <?php
          echo validation_errors();
          if(isset($error)){
            echo $error['error_message'];
          }
          echo form_open('/login');
        ?>
        <div class="form-group">
          <label for="Username">Username or Email Address</label>
          <?php
            $data = array(
              'name'  => 'Usermail',
              'id'    => 'Username',
              'class' => 'form-control'
               );
            echo form_input($data, set_value('Usermail'));
          ?>
        </div>
        <div class="form-group">
          <label for="Password">Password</label>
          <?php
            $data = array(
              'name'  => 'hiddenPassword',
              'id'    => 'Password',
              'class' => 'form-control'
               );
            echo form_password($data, set_value('hiddenPassword'));
          ?>
        </div>
        <div class="form-inline">
          <div class="form-group"><input type="checkbox">Remember me</label></div>
          <div class="form-group"><a href="#">Forgot password</a></div>
        </div>
        <?php
          $data = array(
            'class' => 'btn btn-submit',
            'value' => 'Login'
            );
          echo form_submit($data);
          echo form_close();
        ?>
      </div>
      <div class="col-md-4"></div>
  </div>
</div>
