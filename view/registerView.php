<?php
  session_start();
  if (isset($_SESSION['logged'])) {
    header('Location: theNewest.php');
    exit();
  }
  require_once "../service/utils.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CookWeb</title>
  <meta name="author" content="Piotr Kalota">
  <meta name="description" content="Comunity with love to cooking">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/registerLogin.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
  <div class="welcome">
    <header>CookWeb</header>
    <form id="login" action="../service/register.php" method="post">
      <label>
        Fullname 
        <span class="input-error">
          <?php displayAndUnset('e_fullname'); ?>
        </span>
      </label>
      <input type="text" name="fullname" value=<?php displayInputAndUnset('fullname'); ?>>

      <label>
        Username 
        <span class="input-error">
          <?php displayAndUnset('e_username'); ?>
        </span>
      </label>
      <input type="text" name="username" value=<?php displayInputAndUnset('username'); ?>>

      <label>
        Email 
        <span class="input-error">
          <?php displayAndUnset('e_email'); ?>
        </span>
      </label>
      <input type="text" name="email" value=<?php displayInputAndUnset('email'); ?>>

      <label>
        Password 
        <span class="input-error">
          <?php displayAndUnset('e_password'); ?>
        </span>
      </label>
      <input type="password" name="password">

      <label>
        Password 
        <span class="input-error">
          <?php displayAndUnset('e_pass_repeat'); ?>
        </span>
      </label>
      <input type="password" name="pass-repeat">

      <input type="submit" value="Register">
    </form>
  <div>
</body>

</html>