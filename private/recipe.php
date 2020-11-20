<?php
require_once "debug.php";

class Recipe {
    public $recipeID;
    public $authorID;
    public $addDate;
    public $title;
    public $description;
    public $ingredients;
    public $preparation;
    public $preparation_time;
    public $average_cost;
    public $country;
    public $vegetarian;
    public $difficulty_level;
    public $people_number;
    public $kcal_per_person;
    public $image_path;

    function __construct($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, 
                         $country, $vegetarian, $difficulty_level, $people_number, $kcal_per_person, $image_path) {
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->preparation = $preparation;
        $this->preparation_time = $preparation_time;
        $this->average_cost = $average_cost;
        $this->country = $country;
        $this->vegetarian = $vegetarian;
        $this->difficulty_level = $difficulty_level;
        $this->people_number = $people_number;
        $this->kcal_per_person = $kcal_per_person;
        $this->image_path = $image_path;
    }

/* Validation */
    function isValidTitle() {
        if (strlen($this->title) < 5 || strlen($this->title) > 50) {
            return false;
        }

        return true;
    }

    function isValidDescription() {
        if (strlen($this->description) < 50 || strlen($this->description) > 2500) {
            return false;
        }

        return true;
    }

    function isValidIngredients() {
        if (empty($this->ingredients))
            return false;

        foreach ($this->ingredients as $ing) {
            if (strlen($ing) < 5 || strlen($ing) > 100) {
                return false;
            }
        }

        return true;
    }

    function isValidPreparation() {
        if (empty($this->preparation))
            return false;

        foreach ($this->preparation as $prep) {
            if (strlen($prep) < 5 || strlen($prep) > 100) {
                return false;
            }
        }

        return true;
    }

    function isValidPreparationTime() {
        $number = (int)$this->preparation_time;
        return $number >= 1 && $number <= 324000;
    }

    function isValidAverageCost() {
        $number = (float)$this->preparation_time;
        return $number > 0.1 && $number <= 1000.0;
    }

    function isValidCountry() {
        if (strlen($this->country) < 3 || strlen($this->country) > 50) {
            return false;
        }
        else if (!ctype_alpha($this->country)) {
            return false;
        }

        return true;
    }

    function isValidDifficultyLevel() {
        $number = (float)$this->difficulty_level;
        return $number >= 1 && $number <= 5;
    }

    function isValidNumberOfPeople() {
        $number = (float)$this->people_number;
        return $number >= 1 && $number <= 10;
    }

    function isValidKcalPerPerson() {
        $number = (float)$this->kcal_per_person;
        return $number >= 1 && $number <= 8000;
    }

/* Setters */
    function setAuthorID($id) {
        $this->authorID = $id;
    }

    function setRecipeID($id) {
        $this->recipeID = $id;
    }

    function setAddDate($addDate) {
        $this->addDate = $addDate;
    }

/* Getters */
    function getRecipeID() {
        return $this->recipeID;
    }

    function getAuthorID() {
       return $this->authorID;
    }

    function getAddDate() {
        return $this->addDate;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
       return $this->description;
    }

    function getIngredients() {
        return $this->ingredients;
    }

    function getPreparation() {
        return $this->preparation;
    }

    function getPreparationTime() {
       return $this->preparation_time;
    }

    function getAverageCost() {
        return $this->average_cost;
    }

    function getCountry() {
        return $this->country;
    }

    function getVegetarian() {
        return $this->vegetarian;
    }

    function getDifficultyLevel() {
        return $this->difficulty_level;
    }

    function getPeopleNumber() {
        return $this->people_number;
    }

    function getKcalPerPerson() {
        return $this->kcal_per_person;
    }
    function getImagePath() {
        return $this->image_path;
    }
    
/* Insert to database */
    function insertToDB($connection) {
        $this->addDate = new DateTime();
        $inline_ingredients = "";
        foreach ($this->ingredients as $ing) {
            $inline_ingredients = $inline_ingredients.';'.$ing;
        }
        $inline_preparation = "";
        foreach ($this->preparation as $prep) {
            $inline_preparation = $inline_preparation.';'.$prep;
        }

        debug_to_console("Inline1: ".$inline_ingredients);
        debug_to_console("Inline2: ".$inline_preparation);
        debug_to_console("Inline3: ".$this->image_path);

        $query = $connection->prepare('INSERT INTO Recipes VALUES 
                                      (NULL, :author, now(), :imgPath, :title, :descr, :ingredients,
                                      :preparation, :preparationTime, :averageCost, :country, :vegetarian,
                                      :diffLevel, :pplNumber, :kcalPerPerson)');
        $query->bindValue(":author", $this->authorID, PDO::PARAM_STR);
        $query->bindValue(":imgPath", $this->image_path, PDO::PARAM_STR);
        $query->bindValue(":title", $this->title, PDO::PARAM_STR);
        $query->bindValue(":descr", $this->description, PDO::PARAM_STR);
        $query->bindValue(":ingredients", $inline_ingredients, PDO::PARAM_STR);
        $query->bindValue(":preparation", $inline_preparation, PDO::PARAM_STR);
        $query->bindValue(":preparationTime", $this->preparation_time, PDO::PARAM_STR);
        $query->bindValue(":averageCost", $this->average_cost, PDO::PARAM_STR);
        $query->bindValue(":country", $this->country, PDO::PARAM_STR);
        $query->bindValue(":vegetarian", $this->vegetarian ? '1' : '0', PDO::PARAM_STR);
        $query->bindValue(":diffLevel", $this->difficulty_level, PDO::PARAM_STR);
        $query->bindValue(":pplNumber", $this->people_number, PDO::PARAM_STR);
        $query->bindValue(":kcalPerPerson", $this->kcal_per_person, PDO::PARAM_STR);

        $query->execute();
    }
}
?>