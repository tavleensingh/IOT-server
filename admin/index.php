<?php
  require_once '../core/init.php';
  if(!is_logged_in()){
    header('Location: login.php');
  }
  if(is_logged_in()){
    header('Location: users.php');
  }
  if(!has_permission('admin')){
    permission_error_redirect('../index.php');
  }
  include 'includes/head.php';
  include 'includes/navigation.php';

 ?>
<div class="col-md-12">
</div>
 <?php
  include 'includes/footer.php'
  ?>
