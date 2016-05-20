<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor('/dashboard/', 'Gnasty <i></i> Gaming', 'class="navbar-brand"');?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="navbar-form  navbar-left">
        <div class="form-group">
        <?php if(isset($search_data)): ?>
          <div class="input-group">
            <input id="search_box" class="form-control" type="text" placeholder="Search" value="<?php echo $search_data;?>"/>
          </div>
        <?php else: ?>
          <div class="input-group">
            <input id="search_box" class="form-control" type="text" placeholder="Search"/>
          </div>
        <?php endif;?>
          <button id="btn_search" class="form-control"><span class="glyphicon glyphicon-search"></span></button>
        </div>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo anchor('/profile/', 'Profile'); ?></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-cog"></span>
          </a>
          <ul class="dropdown-menu">
            <li><?php echo anchor('/settings/', 'Settings'); ?></li>
            <li role="separator" class="divider"></li>
            <li> <?php echo anchor('/logout/', 'Logout'); ?></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


