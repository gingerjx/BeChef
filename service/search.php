<?php
    function getFilteredRecipes() {
        require_once($_SERVER['DOCUMENT_ROOT']."/database/connectDB.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/database/recipesDB.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/models/user.php");

        $title = htmlentities($_GET['title'], ENT_QUOTES, "UTF-8");
        $author = htmlentities($_GET['author'], ENT_QUOTES, "UTF-8");
        $tag = htmlentities($_GET['tag'], ENT_QUOTES, "UTF-8");
        $country = htmlentities($_GET['country'], ENT_QUOTES, "UTF-8");
        $vegetarian = htmlentities($_GET['vegetarian'], ENT_QUOTES, "UTF-8");
        $min_diff = htmlentities($_GET['min_diff'], ENT_QUOTES, "UTF-8");
        $max_diff = htmlentities($_GET['max_diff'], ENT_QUOTES, "UTF-8");
        $min_avg_cost = htmlentities($_GET['min_avg_cost'], ENT_QUOTES, "UTF-8");
        $max_avg_cost = htmlentities($_GET['max_avg_cost'], ENT_QUOTES, "UTF-8");
        $min_ppl_num = htmlentities($_GET['min_ppl_num'], ENT_QUOTES, "UTF-8");
        $max_ppl_num = htmlentities($_GET['max_ppl_num'], ENT_QUOTES, "UTF-8");
        $min_kcal = htmlentities($_GET['min_kcal'], ENT_QUOTES, "UTF-8");
        $max_kcal = htmlentities($_GET['max_kcal'], ENT_QUOTES, "UTF-8");
        
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
        if ($vegetarian !== 'both')
            $prepared_query .= " vegetarian=:vegetarian AND";

        $prepared_query .= " difficultyLevel>=:minDiff AND difficultyLevel<=:maxDiff AND ";
        $prepared_query .= " averageCost>=:minAvgCost AND averageCost<=:maxAvgCost AND ";
        $prepared_query .= " peopleNumber>=:minPplNum AND peopleNumber<=:maxPplNum AND ";
        $prepared_query .= " kcalPerPerson>=:minKcal AND kcalPerPerson<=:maxKcal";

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
        if ($vegetarian !== 'both')
            $query->bindValue(":vegetarian", $vegetarian == 'yes' ? '1' : '0', PDO::PARAM_STR);

        $query->bindValue(":minDiff", $min_diff, PDO::PARAM_STR);
        $query->bindValue(":maxDiff", $max_diff, PDO::PARAM_STR);
        $query->bindValue(":minAvgCost", $min_avg_cost, PDO::PARAM_STR);
        $query->bindValue(":maxAvgCost", $max_avg_cost, PDO::PARAM_STR);
        $query->bindValue(":minPplNum", $min_ppl_num, PDO::PARAM_STR);
        $query->bindValue(":maxPplNum", $max_ppl_num, PDO::PARAM_STR);
        $query->bindValue(":minKcal", $min_kcal, PDO::PARAM_STR);
        $query->bindValue(":maxKcal", $max_kcal, PDO::PARAM_STR);

        $query->execute();
        return getRecipesArray($query);
    }
?>