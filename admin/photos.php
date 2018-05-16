<?php
  require_once '../core/init.php';
  if(!is_logged_in()){
    login_error_redirect();
  }
  if(!has_permission('admin')){
    permission_error_redirect('../index.php');
  }
  include 'includes/head.php';
  include 'includes/navigation.php';
  $Query = $db->query("SELECT * FROM files WHERE type = 'photo'");
  ?>
  <h2>Photos</h2>
  <hr>
  <table class="table table-bordered table-striped table-condensed">
    <thead><th></th><th>File Name</th><th>Upload Date</th></thead>
    <tbody>
      <?php while($file = mysqli_fetch_assoc($Query)):
            $userid = $file['user_id'];
            $result = $db->query("SELECT * FROM users WHERE id = '$userid'");
            $user = mysqli_fetch_assoc($result);?>
      <tr>
        <td>
          <a href="photos.php?delete=<?=$user['id'];?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></a>
        </td>
        <td><?=$file['name'];?></td>
        <td><?=pretty_date($file['upload_date']);?></td>
      </tr>
    <?php endwhile;?>
    </tbody>
  </table>

  <?php include 'includes/footer.php'?>
