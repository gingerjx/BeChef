<?php
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    session_start();

    $title = $_POST['title'];
    $description = $_POST['description'];

    $ingredient_number = 1;
    $ingredients = array();
    while (!empty($_POST['ingredient-'.$ingredient_number])) {
        $ingredients[] = $_POST['ingredient-'.$ingredient_number];
        $ingredient_number += 1;
    }

    $preparation_number = 1;
    $preaparations = array();
    while (!empty($_POST['preparation-'.$preparation_number])) {
        $preaparations[] = $_POST['preparation-'.$preparation_number];
        $preparation_number += 1;
    }

    $preparation_time = $_POST['preparation-time'];
    $average_cost = $_POST['average-cost'];
    $country = $_POST['country'];
    $vegetarian = empty($_POST['vegetarian']) ? false : true;
    $difficulty_level = $_POST['difficulty-level'];
    $number_of_people = $_POST['number-of-people'];
    $kcal_per_person = $_POST['kcal-per-person'];

    $max_size = 1024*1024;
    if (is_uploaded_file($_FILES['recipe-img']['tmp_name'])) {
        if ($_FILES['recipe-img']['size']  <= $max_size){
            move_uploaded_file($_FILES['recipe-img']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'].'/public/img/'.$_FILES['recipe-img']['name']);
        }
    } 

    //header("Location: ../public/savesView.php");
?>