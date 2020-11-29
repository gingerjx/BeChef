<?php
    $url = strtok($_SERVER['HTTP_REFERER'], '?');
    if (isset($_POST['order-by'])) {
        $order_by = $_POST['order-by'];
        if (isset($_POST['order'])) {
            header('Location: '.$url.'?column='.$order_by.'&order=ASC');
        } else {
            header('Location: '.$url.'?column='.$order_by.'&order=DESC');
        }
        exit();
    }

    header('Location: '.$url);
    exit();
?>