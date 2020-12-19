<?php 
class Comment {
    private $comment_id;
    private $recipe_id;
    private $user_id;
    private $fullname;
    private $add_date;
    private $content;

    function __construct($comment_id, $recipe_id, $user_id, $fullname, $add_date, $content) {
        $this->comment_id = $comment_id;
        $this->recipe_id = $recipe_id;
        $this->user_id = $user_id;
        $this->fullname = $fullname;
        $this->add_date = $add_date;
        $this->content = $content;
    }

/* Getters */
    function getCommentID() {
        return $this->comment_id;
    }

    function getRecipeID() {
        return $this->recipe_id;
    }

    function getUserID() {
        return $this->user_id;
    }

    function getAddDate() {
        return $this->add_date;
    }

    function getContent() {
        return $this->content;
    }

    function getFullname() {
        return $this->fullname;
    }

/* Setters */
    function setCommentID($comment_id) {
        return $this->comment_id = $comment_id;
    }

    function setRecipeID($recipe_id) {
        return $this->recipe_id = $recipe_id;
    }

    function setUserID($user_id) {
        return $this->user_id = $user_id;
    }

    function setAddDate($add_date) {
        return $this->add_date = $add_date;
    }

    function setContent($content) {
        return $this->content = $content;
    }

    function setFullname($fullname) {
        return $this->fullname = $fullname;
    }
};
?>