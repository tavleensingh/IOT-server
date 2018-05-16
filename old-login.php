<?php
require_once 'core/init.php';
include'includes-login/head.php';
$errors = array();
?>
  <div class="wrapper">
      <div id="error">
      <?php
              if ($_POST) {
                  echo "posted";
                if(isset($_GET['login'])){
                //form validation
                if (empty($_POST['email']) || empty($_POST['password'])) {
                  $errors[] = 'You must provide email and password.';
                }else{
                //validate email
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                  $errors[] = 'You must enter a valid email.';
                }

                // password is more than 6 characters
                if (strlen($password) < 6) {
                  $errors[] = 'Password must be atleast 6 characters.';
                }

                // check if email exist in database
                $query = $db->query("SELECT * FROM users WHERE email = '$email'");
                $user = mysqli_fetch_assoc($query);
                $userCount = mysqli_num_rows($query);
                if($userCount < 1){
                  $errors[] = 'That email doesn\'t exist in our database';
                }

                if(!password_verify($password, $user['password'])){
                  $errors[] = 'The password does not match our records. Please try again';
                }
              }
                //check for errors
                if (!empty($errors)) {
                  echo display_errors($errors);
                }else{
                  //log user in
                  $user_id = $user['id'];
                  login($user_id);
                }
              }
            }
            ?>
      </div>
  <form class="login" action="login.php?login=1" method="post">
    <p class="title">Log in</p>
      
    <input type="text" id="email" placeholder="Username" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" id="password" placeholder="Password" />
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a>
    <br>
    <a href="#">Register</a>  
    <button type="submit">
      <i class="spinner"></i>
      <span class="state">Log in</span>
    </button>
  </form>
</div>
<?php include'includes-login/footer.php';?>