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
    <form id="login" action="../service/login.php" method="post">
      <label>Username</label>
      <input type="text" name="username" value=<?php displayAndUnset('username'); ?>> 

      <label>Password</label>
      <input type="password" name="password">

      <input type="submit" value="Login">
    </form>
    <div class="login-error"> <?php displayAndUnset('e_login') ?> </div>
    <form id="register" action="registerView.php">
      <label>Not register yet? Join us!</label>
      <input type="submit" value="Register">
    </form>
  <div>
</body>

</html>