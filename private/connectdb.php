<?php
    $server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "CookPortal";

    try {
        $firstParam = "mysql:host={$server};dbname={$db_name};charset=utf8";
        $connection = new PDO($firstParam, $db_user, $db_password,
                              [PDO::ATTR_EMULATE_PREPARES => false,
                               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo "<b>Connection failed:</b> " . $e->getMessage();
    }
?>