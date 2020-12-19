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

        <form action="service/login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" autocomplete="off"> 
        
            <label>Password</label>
            <input type="password" name="password">
        
            <input type="submit" value="Login">
        </form>
        
        <div class="login-error"></div>

        <div id="register-message">
            <p>Not register yet? Join us!</p>
            <button>Register</button>
        </div>
    </div>
  </body>
</html>