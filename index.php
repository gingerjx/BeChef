<?php
  session_start();

  // $user = null;
  // if (isset($_SESSION['logged']))
  //   $user = unserialize($_SESSION['user']);
?>

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
    <?php include 'view/components/nav.php' ?>
    <?php include 'view/components/home.php' ?>
  </body>
</html>
