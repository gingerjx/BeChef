<?php
  session_start();

  require_once("database/numbersDB.php");
?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <title>BeChef</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="BeChef">
    <link rel="stylesheet" type="text/css" href="view/styles/style.css">
    <script src="view/script/jquery-3-5-1.min.js"></script>
  </head>
  <body>
    <?php include 'view/components/nav.php' ?>
    <?php include 'view/components/home.php' ?>
  </body>
</html>
