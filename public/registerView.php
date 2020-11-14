<?php
  session_start();
  if (isset($_SESSION['logged'])) {
    header('Location: theNewest.php');
    exit();
  }
  require_once "../private/utils.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CookWeb</title>
  <meta name="author" content="Piotr Kalota">
  <meta name="description" content="Comunity with love to cooking">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/public/css/registerLogin.css" rel="stylesheet">
</head>

<body>
  <div class="welcome">
    <header>CookWeb</header>
    <form id="login" action="../private/register.php" method="post">
      <label>
        Fullname 
        <span class="input-error">
          <?php displayAndUnset('e_fullname'); ?>
        </span>
      </label>
      <input type="text" name="fullname" value=<?php displayAndUnset('fullname'); ?>>

      <label>
        Username 
        <span class="input-error">
          <?php displayAndUnset('e_username'); ?>
        </span>
      </label>
      <input type="text" name="username" value=<?php displayAndUnset('username'); ?>>

      <label>
        Email 
        <span class="input-error">
          <?php displayAndUnset('e_email'); ?>
        </span>
      </label>
      <input type="text" name="email" value=<?php displayAndUnset('email'); ?>>

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