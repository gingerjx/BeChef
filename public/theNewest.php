<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CookWeb</title>
  <meta name="author" content="Piotr Kalota">
  <meta name="description" content="Comunity with love to cooking">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/public/css/navigation.css?v=<?php echo time(); ?>">
  <link href="/public/css/home.css" rel="stylesheet">
</head>
<body>
  <nav>
    <div class="nav-item"><img src="img/trayOrange.svg" alt="Web icon"/></div> 
    <div class="nav-item"><p>The Newest</p></div>
    <div class="nav-item"><p>Popular</p></div>
    <div class="nav-item"><p>Search</p></div>

    <?php if(isset($_SESSION['logged'])) : ?>
      <div id="username" class="nav-item">
        <p><?php echo $_SESSION['username']; ?></p>
        <div id="usermenu">
          <form id="saves" action="#">
            <input type="submit" value="Saves">
          </form>
          <form id="add-recipe" action="#">
            <input type="submit" value="Add recipe">
          </form>
          <form id="your-recipe" action="#">
            <input type="submit" value="Your recipes">
          </form>
          <form id="settings" action="#">
            <input type="submit" value="Settings">
          </form>
          <form id="logout" action="../private/logout.php">
            <input type="submit" value="Logout">
          </form>
        </div>
      </div>
    <?php else : ?>
      <div id="login" class="nav-item">          
        <form action="loginView.php">
            <input type="submit" value="Login">
        </form>
      </div>
    <?php endif; ?>

  </nav>

  <script src="js/navigation.js"></script>
</body>
</html>
