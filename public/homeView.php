<?php 
session_start();
if (isset($_SESSION['logged'])) {
    echo "Hello ".$_SESSION['username'];
} 
else {
    header("Location: public/loginView.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CookWeb</title>
  <meta name="author" content="Piotr Kalota">
  <meta name="description" content="Comunity with love to cooking">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link href="/public/css/registerLogin.css" rel="stylesheet"> -->
</head>

<body>
    <form id="logout" action="../private/logout.php">
      <input type="submit" value="Logout">
    </form>
</body>

</html>
