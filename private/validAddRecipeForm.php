<?php
    /* Skips only uploaded image */
    function catchAddRecipeFormErrors($recipe) {
        $valid = true;

        if (!$recipe->isValidTitle()) {
            $valid = false;
            $_SESSION['e_title'] = 'Text range: (5, 50)';
        }
        
        if (!$recipe->isValidDescription()) {
            $valid = false;
            $_SESSION['e_description'] = 'Text range: (50, 2500)';
        }

        if (!$recipe->isValidIngredients()) {
            $valid = false;
            $_SESSION['e_ingredients'] = 'Minimum 1 ingredient. Text range: (5, 50)';
        }

        if (!$recipe->isValidPreparation()) {
            $valid = false;
            $_SESSION['e_preparation'] = 'Minimum 1 preparation step. Text range: (5, 50)';
        }

        if (!$recipe->isValidPreparationTime()) {
            $valid = false;
            $_SESSION['e_preparation_time'] = 'Range (1, 324000) minutes';
        }

        if (!$recipe->isValidAverageCost()) {
            $valid = false;
            $_SESSION['e_average_cost'] = 'Range (0.1, 1000) dollars';
        }

        if (!$recipe->isValidCountry()) {
            $valid = false;
            $_SESSION['e_country'] = 'Text range (3, 50)';
        }

        if (!$recipe->isValidDifficultyLevel()) {
            $valid = false;
            $_SESSION['e_difficulty_level'] = 'Range (1, 5)';
        }

        if (!$recipe->isValidNumberOfPeople()) {
            $valid = false;
            $_SESSION['e_people_number'] = 'Range (1, 10)';
        }

        if (!$recipe->isValidKcalPerPerson()) {
            $valid = false;
            $_SESSION['e_kcal_per_person'] = 'Range (1, 8000)';
        }

        return $valid;
    }
?>