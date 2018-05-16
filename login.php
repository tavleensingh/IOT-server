<?php
require_once 'core/init.php';
include'includes-login/head.php';
include 'includes-login/navigation.php';
$name = ((isset($_POST['name']))?sanitize($_POST['name']):'');
$email =((isset($_POST['email']))?sanitize($_POST['email']):'');
  $email = trim($email);
  $password =((isset($_POST['password']))?sanitize($_POST['password']):'');
  $password = trim($password);
  $confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
$regNumber=((isset($_POST['regNumber']))?sanitize($_POST['regNumber']):'');
  $errors = array();
?>

  <div class="form" id="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#register">Register</a></li>
      </ul>
      <div style="color:red;">
            <?php
              if ($_POST) {
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
              if (isset($_GET['register'])) {
                // check if email already exist in database
                $emailQuery = $db->query("SELECT * FROM users WHERE email = '$email'");
                $emailCount = mysqli_num_rows($emailQuery);
                if($emailCount != 0){
                  $errors[] = 'That email already exist in our database.';
                }
                $required = array('name', 'email', 'password', 'confirm');
                foreach ($required as $field) {
                  if(empty($_POST[$field])){
                    $errors[] = 'You must fill out all fields';
                    break;
                  }
                }

                // password is more than 6 characters
                if (strlen($password) < 6) {
                  $errors[] = 'Password must be atleast 6 characters.';
                }
                //password matches confirm password
                if($password != $confirm){
                  $errors[] = 'The passwords do not match.';
                }
                //validate email
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                  $errors[] = 'You must enter a valid email.';
                }

                if(!empty($errors)){
                  echo display_errors($errors);
                }else{
                  //add user to database and login
                  $hashed = password_hash($password,PASSWORD_DEFAULT);
                  $db->query("INSERT INTO users (`full_name`,`email`,`password`,`reg_number`) VALUES ('$name','$email','$hashed','$regNumber')");
                  $query = $db->query("SELECT * FROM users WHERE email = '$email'");
                  $user = mysqli_fetch_assoc($query);
                  $user_id = $user['id'];
                $db->query("UPDATE devices SET user_id='$user_id' WHERE reg_number='$regNumber'");
                  register($user_id);
                }
              }
            }
            ?>

          </div>
      <div class="tab-content">

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="login.php?login=1" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button type="submit" class="button button-block"/>Log In</button>

          </form>

        </div>
        <div id="register">
          <h1>Register your iot device and get started!!</h1>

          <form action="login.php?register=1" method="post">

            <div class="field-wrap">
              <label>
                Full Name<span class="req">*</span>
              </label>
              <input type="text" name="name" id="name" required autocomplete="off" />
            </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="confirm" id="confirm" required autocomplete="off"/>
          </div>
        <div class="field-wrap">
            <label>
              Registration number<span class="req">*</span>
            </label>
            <input type="text" name="regNumber" id="regNumber" required autocomplete="off"/>
          </div>

          <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
<?php include'includes-login/footer.php';?>
