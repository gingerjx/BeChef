<?php
    session_start();

    require_once "../database/connectDB.php";
    require_once "../database/recipesDB.php";
    require_once "../models/user.php";

    $author = null;
    if (basename($_SERVER['HTTP_REFERER']) == 'userRecipesView.php') {
        if (isset($_SESSION['logged'])) {
            $user = unserialize($_SESSION['user']);
            $author = $user->getUsername();
        } else 
            $author = '';
    } else 
        $author = htmlentities($_POST['author'], ENT_QUOTES, "UTF-8");
    

    $title = htmlentities($_POST['title'], ENT_QUOTES, "UTF-8");
    $tag = htmlentities($_POST['tag'], ENT_QUOTES, "UTF-8");
    $country = htmlentities($_POST['country'], ENT_QUOTES, "UTF-8");
    $prepared_query =  'SELECT * 
                        FROM Recipes
                        WHERE '; 

    if (!empty($title)) 
        $prepared_query .= " title=:title AND";
    if (!empty($author))
        $prepared_query .= " authorID in (SELECT id FROM `Users` WHERE username=:username OR fullname=:fullname) AND";
    if (!empty($tag)) 
        $prepared_query .= " recipeID in (SELECT recipeID FROM `Tags` WHERE name=:tag) AND";
    if (!empty($country)) 
        $prepared_query .= " country=:country AND";
    if (isset($_POST['vegatarian']))
        $prepared_query .= " vegetarian=:vegatarian AND";
    if (isset($_POST['diff-box'])) 
        $prepared_query .= " difficultyLevel<=:diff AND";
    if (isset($_POST['cost-box'])) 
        $prepared_query .= " averageCost<=:cost AND";
    if (isset($_POST['people-box'])) 
        $prepared_query .= " peopleNumber<=:people AND";
    if (isset($_POST['kcal-box'])) 
        $prepared_query .= " kcalPerPerson <=:kcal AND";

    // none search element was POSTed
    if (substr($prepared_query, -3) != 'AND')
        header('Location: '.$_SERVER['HTTP_REFERER']);
    $prepared_query = substr($prepared_query, 0, -3);
    $query = $connection->prepare($prepared_query);

    if (!empty($title)) 
        $query->bindValue(":title", $title, PDO::PARAM_STR);
    if (!empty($author)) {
        $query->bindValue(":username", $author, PDO::PARAM_STR);
        $query->bindValue(":fullname", $author, PDO::PARAM_STR);
    }
    if (!empty($tag)) 
        $query->bindValue(":tag", $tag, PDO::PARAM_STR);
    if (!empty($country)) 
        $query->bindValue(":country", $country, PDO::PARAM_STR);
    if (isset($_POST['vegatarian']))
        $query->bindValue(":vegatarian", $_POST['vegatarian'] == 'yes' ? '1' : '0', PDO::PARAM_STR);
    if (isset($_POST['diff-box'])) 
        $query->bindValue(":diff", $_POST['diff'], PDO::PARAM_STR);
    if (isset($_POST['cost-box'])) 
        $query->bindValue(":cost", $_POST['cost'], PDO::PARAM_STR);
    if (isset($_POST['people-box'])) 
        $query->bindValue(":people", $_POST['people'], PDO::PARAM_STR);
    if (isset($_POST['kcal-box'])) 
        $query->bindValue(":kcal", $_POST['kcal'], PDO::PARAM_STR);
    $query->execute();

    $_SESSION['searched_recipes'] = serialize(getRecipesArray($query));
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>