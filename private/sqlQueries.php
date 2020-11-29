<?php
/* --------------------------RECIPES----------------------------- */

    $select_all_recipes =                   'SELECT * 
                                            FROM Recipes';

    $select_user_recipes =                  'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID';

/* --------------------------USER RECIPES IN ORDER----------------------------- */

    $select_user_recipes_by_add_date_desc = 'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY addDate DESC'; 

    $select_user_recipes_by_add_date_asc = 'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY addDate ASC'; 

    $select_user_recipes_by_title_desc =    'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY title DESC';

    $select_user_recipes_by_title_asc =     'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID 
                                            ORDER BY title ASC';

    $select_user_recipes_by_likes_desc =    'SELECT r.*, COUNT(l.likeID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Likes l ON r.recipeID = l.recipeID 
                                            WHERE r.authorID=:authorID
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count DESC';

    $select_user_recipes_by_likes_asc =     'SELECT r.*, COUNT(l.likeID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Likes l ON r.recipeID = l.recipeID 
                                            WHERE r.authorID=:authorID
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count ASC';
                                            
    $select_user_recipes_by_saves_desc =    'SELECT r.*, COUNT(s.savedID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Saves s ON r.recipeID = s.recipeID 
                                            WHERE r.authorID=:authorID
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count ASC';

    $select_user_recipes_by_saves_asc =     'SELECT r.*, COUNT(s.savedID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Saves s ON r.recipeID = s.recipeID 
                                            WHERE r.authorID=:authorID
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count DESC';

/* ------------------------------------SELECT ALL RECIPES IN ORDER-------------------------------------------------------- */

    $select_all_recipes_by_add_date_desc =  'SELECT * 
                                            FROM Recipes 
                                            ORDER BY addDate DESC'; 

    $select_all_recipes_by_add_date_asc =   'SELECT * 
                                            FROM Recipes 
                                            ORDER BY addDate ASC'; 

    $select_all_recipes_by_title_desc =     'SELECT * 
                                            FROM Recipes 
                                            ORDER BY title DESC';

    $select_all_recipes_by_title_asc =      'SELECT * 
                                            FROM Recipes 
                                            ORDER BY title ASC';

    $select_all_recipes_by_likes_desc =     'SELECT Recipes.*, COUNT(Likes.likeID) AS recipe_count 
                                            FROM Recipes 
                                            LEFT JOIN Likes ON Recipes.recipeID = Likes.recipeID
                                            GROUP BY Recipes.recipeID 
                                            ORDER BY recipe_count DESC';

    $select_all_recipes_by_likes_asc =      'SELECT Recipes.*, COUNT(Likes.likeID) AS recipe_count 
                                            FROM Recipes 
                                            LEFT JOIN Likes ON Recipes.recipeID = Likes.recipeID
                                            GROUP BY Recipes.recipeID 
                                            ORDER BY recipe_count ASC';
        
    $select_all_recipes_by_saves_desc =     'SELECT Recipes.*, COUNT(Saves.savedID) AS recipe_count 
                                            FROM Recipes 
                                            LEFT JOIN Saves ON Recipes.recipeID = Saves.recipeID
                                            GROUP BY Recipes.recipeID 
                                            ORDER BY recipe_count DESC';

    $select_all_recipes_by_saves_asc =      'SELECT Recipes.*, COUNT(Saves.savedID) AS recipe_count 
                                            FROM Recipes 
                                            LEFT JOIN Saves ON Recipes.recipeID = Saves.recipeID
                                            GROUP BY Recipes.recipeID 
                                            ORDER BY recipe_count ASC';

?>