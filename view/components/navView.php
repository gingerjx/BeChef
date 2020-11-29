<nav>
    <div class="nav-item"><img src="img/tray-orange.svg" alt="Web icon"/></div> 
    <div class="nav-item"><p><a href="../view/newestView.php">The Newest</a></p></div>
    <div class="nav-item"><p><a href="../view/popularView.php">Popular</a></p></div>
    <div class="nav-item"><p><a href="../view/searchView.php">Search</a></p></div>

    <?php if(isset($_SESSION['logged'])) : ?>
      <div id="username" class="nav-item">
        <p>
        <?php 
          require_once "../models/user.php";
          $user = unserialize($_SESSION['user']);
          echo $user->getUsername(); 
        ?>
        </p>
        <div id="usermenu">
          <p><a href="../view/savedView.php">Saves</a></p>
          <p><a href="../view/addRecipeView.php">Add recipe</a></p>
          <p><a href="../view/userRecipesView.php">Your recipes</a></p>
          <!--<p><a href="#">Settings</a></p>-->
          <p><a href="../service/logout.php">Logout</a></p>
        </div>
      </div>
    <?php else : ?>
      <div id="login" class="nav-item"><p><a href="loginView.php">Login</a></p></div>
    <?php endif; ?>
  </nav>