<?php
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('Location: loginView.php');
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/navigation.js"></script>
  <link rel="stylesheet" href="/public/css/navigation.css?v=<?php echo time(); ?>">
  <link href="/public/css/home.css" rel="stylesheet">
</head>
<body>
  <?php include "../private/navView.php" ?>
</body>
</html>