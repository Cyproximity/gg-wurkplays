<?php
  echo anchor('/dashboard/', 'Dashboard');
  echo anchor('/settings/', 'Settings');
  echo anchor('/logout/', 'Logout');
?>
<div class="container">
  <div class="row">
    <h2>Profile</h2>
    <h4><?php echo ucfirst($this->session->username); ?></h4>
  </div>
</div>
