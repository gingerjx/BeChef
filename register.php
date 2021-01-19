<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="BeChef">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <script src="view/script/jquery-3-5-1.min.js"></script>
  </head>
  <body>
    <div id="register">
      <div id="register-logo">
        <img src="view/images/cooking.svg" />
        <h1>BeChef</h1>
      </div>

      <form id="register-form" action="service/register.php" method="post">
        <label>Fullname</label>
        <input id="fullname" name="fullname" type="text" autocomplete="off">
        <span id="fullname-error" class="input-error"></span>

        <label>Username</label>
        <input id="username" name="username" type="text" autocomplete="off">
        <span id="username-error" class="input-error"></span>

        <label>Email</label>
        <input id="email" name="email" type="text" autocomplete="off">
        <span id="email-error" class="input-error"></span>

        <label>Password</label>
        <input id="password" name="password" type="password">
        <span id="password-error" class="input-error"></span>

        <label> Password</label>
        <input id="pass-repeat" name="pass-repeat" type="password">
        <span id="pass-repeat-error" class="input-error"></span>

        <input type="submit" value="Register">
      </form>
    <div>
    <script src="view/script/register.js"></script>
  </body>
</html>
