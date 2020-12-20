<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="description" content="BeChef">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="login">>
        <div id="login-logo">
            <img src="view/images/cooking.svg" alt="logo"/>
            <h1>BeChef</h1>
        </div>

        <form id="login-form" action="service/login.php" method="post">
            <label>Username</label>
            <input name="username" type="text" autocomplete="off"> 
        
            <label>Password</label>
            <input name="password" type="password">
        
            <input name="submit" type="submit" value="Login">
        </form>
        
        <div id="login-error" class="login-error"></div>

        <div id="register-message">
            <p>Not register yet? Join us!</p>
            <button id="register-button">Register</button>
        </div>
    </div>
    <script src="view/script/login.js?v=<?php echo time(); ?>"></script>
  </body>
</html>