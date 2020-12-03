<?php
    session_start();

    require_once "../database/sqlQueries.php";
    require_once "../database/connectDB.php";
    require_once "../database/recipesDB.php";

    $title = $_POST['title'];
    $tag = $_POST['tag'];
    // $diff_box = $_POST['diff-box'];
    // $diff = $_POST['diff'];
    // $cost_box = $_POST['cost-box'];
    // $cost = $_POST['cost'];
    // $people_box = $_POST['people-box'];
    // $people = $_POST['people'];
    // $kcal_box = $_POST['kcal-box'];
    // $kcal = $_POST['kcal'];

    $prepared_query =  $select_all_recipe_by;
    if (!empty($title)) 
        $prepared_query .= " title=:title AND";
    if (!empty($tag)) 
        $prepared_query .= " recipeID in (SELECT recipeID FROM `Tags` WHERE name=:tag) AND";
    
    if ($prepared_query == $select_all_recipe_by)
        header('Location: '.$_SERVER['HTTP_REFERER']);
    $prepared_query = substr($prepared_query, 0, -3);
    $query = $connection->prepare($prepared_query);

    if (!empty($title)) 
        $query->bindValue(":title", $title, PDO::PARAM_STR);
    if (!empty($tag)) 
        $query->bindValue(":tag", $tag, PDO::PARAM_STR);
    $query->execute();

    $_SESSION['searched_recipes'] = serialize(getRecipesArray($query));
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>