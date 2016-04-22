<body>

  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
      <h1>Register</h1>
        <?php echo form_open('/register')?>
        <?php echo validation_errors(); ?>
        <div class="form-group">
        <label for="Username">Username</label>
        <?php
          $data = array(
            'name'  => 'Username',
            'class' => 'form-control',
            'id'    =>  'Username'
            );
          echo form_input($data, set_value('Username'));
        ?>
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <?php
          $data = array(
            'name'  => 'Email',
            'class' => 'form-control',
            'id'    =>  'Email',
            );
          echo form_input($data, set_value('Email'));
        ?>
        </div>
        <div class="form-group">
        <label for="Password">Password</label>
        <?php
          $data = array(
            'name'  => 'Password',
            'class' => 'form-control',
            'id'    =>  'Password',
            );
          echo form_password($data, set_value('Password'));
        ?>
        </div>
        <div class="form-group">
        <label for="Confirm_Password">Confirm Password</label>
        <?php
          $data = array(
            'name'  => 'ConPassword',
            'class' => 'form-control',
            'id'    =>  'Confirm_Password',
            );
          echo form_password($data, set_value('ConPassword'));
        ?>
        </div>
        <div class="checkbox">
          <label><input type="checkbox">Terms and Conditions</label>
        </div>
        <?php
          $data = array(
              'class' => 'btn btn-submit',
              'value' => 'Register'
              );

          echo form_submit($data);

          echo form_close();
        ?>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
