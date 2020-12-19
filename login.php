<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="description" content="BeChef">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="login">
        <div id="login-logo">
            <img src="view/images/cooking.svg" />
            <h1>BeChef</h1>
        </div>

        <form id="login" action="../service/login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" autocomplete="off"> 
        
            <label for="password">Password</label>
            <input type="password" name="password">
        
            <input type="submit" value="Login">
        </form>
        
        <div class="login-error"></div>

        <div id="register-message">
            <p>Not register yet? Join us!</p>
            <a href="#">            
                <button>Register</button>
            </a>
        </div>
    </div>
  </body>
</html>