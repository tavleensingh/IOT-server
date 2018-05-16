<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="/cloud/admin/index.php" class="navbar-brand">Cloud Drive Admin</a>
    <ul class="nav navbar-nav">
        <!--Menu item-->
        <?php if(has_permission('admin')): ?>
          <li><a href="users.php">Users</a></li>
          <li><a href="photos.php">Devices</a></li>
        <?php endif;?>
        <li class="dropdown">
          <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <?=$user_data['first'];?>! <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="dLabel" role="menu">
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['institute']; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           <li><a href="#"><?php echo $child['institute']; ?></a></li>

        </ul>
      </li>-->

    </ul>
  </div>
</nav>
<div class="container">
