<?php
/* --------------------------RECIPES----------------------------- */

    $select_all_recipes =                   'SELECT * 
                                            FROM Recipes';

    $select_user_recipes =                  'SELECT * 
                                            FROM Recipes 
                                            WHERE authorID=:authorID';
    
    $select_user_saved_recipes =            'SELECT * 
                                            FROM `Recipes` 
                                            WHERE recipeID in (SELECT recipeID 
                                                                FROM `Saves` 
                                                                WHERE userID=:userID)';

    $select_recipe_by_id =                  'SELECT * 
                                            FROM Recipes 
                                            WHERE recipeID=:recipeID';
                                            
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

    $select_all_recipes_by_likes_desc =     'SELECT r.*, COUNT(l.likeID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Likes l ON r.recipeID = l.recipeID 
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count DESC';

    $select_all_recipes_by_likes_asc =      'SELECT r.*, COUNT(l.likeID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Likes l ON r.recipeID = l.recipeID 
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count ASC';
        
    $select_all_recipes_by_saves_desc =     'SELECT r.*, COUNT(s.savedID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Saves s ON r.recipeID = s.recipeID 
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count DESC';

    $select_all_recipes_by_saves_asc =      'SELECT r.*, COUNT(s.savedID) AS recipe_count 
                                            FROM Recipes r 
                                            LEFT JOIN Saves s ON r.recipeID = s.recipeID 
                                            GROUP BY r.recipeID 
                                            ORDER BY recipe_count ASC';

/* ---------------------------------------USER BY---------------------------------------------------- */

    $select_user_by_id =                    'SELECT * 
                                            FROM Users 
                                            WHERE id=:id';
    
    $select_user_by_username =              'SELECT * 
                                            FROM Users 
                                            WHERE username=:username';

/* ---------------------------------------COMMENTS---------------------------------------------------- */

    $select_comments_by_recipe_id =         'SELECT * 
                                            FROM Comments 
                                            WHERE recipeID=:recipeID';

/* ---------------------------------------NUMBERS---------------------------------------------------- */

    $select_recipe_likes_number =           'SELECT * 
                                            FROM Likes 
                                            WHERE recipeID=:recipeID';

    $select_recipe_saves_number =           'SELECT * 
                                            FROM Saves 
                                            WHERE recipeID=:recipeID';

    $select_recipe_comments_number =        'SELECT * 
                                            FROM Comments 
                                            WHERE recipeID=:recipeID';

/* ---------------------------------------CHECK---------------------------------------------------- */

    $is_liked_by_user =                     'SELECT * 
                                            FROM Likes 
                                            WHERE recipeID=:recipeID AND userID=:userID';

    $is_saved_by_user =                     'SELECT * 
                                            FROM Saves 
                                            WHERE recipeID=:recipeID AND userID=:userID';
?>