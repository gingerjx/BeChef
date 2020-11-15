<nav>
    <div class="nav-item"><img src="img/trayOrange.svg" alt="Web icon"/></div> 
    <div class="nav-item"><p><a href="../public/newestView.php">The Newest</a></p></div>
    <div class="nav-item"><p><a href="#">Popular</a></p></div>
    <div class="nav-item"><p><a href="#">Search</a></p></div>

    <?php if(isset($_SESSION['logged'])) : ?>
      <div id="username" class="nav-item">
        <p><?php echo $_SESSION['username']; ?></p>
        <div id="usermenu">
          <p><a href="../public/savesView.php">Saves</a></p>
          <p><a href="../public/addRecipeView.php">Add recipe</a></p>
          <p><a href="#">Your recipes</a></p>
          <p><a href="#">Settings</a></p>
          <p><a href="../private/logout.php">Logout</a></p>
        </div>
      </div>
    <?php else : ?>
      <div id="login" class="nav-item"><p><a href="loginView.php">Login</a></p></div>
    <?php endif; ?>
  </nav>