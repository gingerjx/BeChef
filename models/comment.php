<?php 
class Comment {
    private $commentID;
    private $recipeID;
    private $userID;
    private $fullname;
    private $addDate;
    private $content;

    function __construct($commentID, $recipeID, $userID, $fullname, $addDate, $content) {
        $this->commentID = $commentID;
        $this->recipeID = $recipeID;
        $this->userID = $userID;
        $this->fullname = $fullname;
        $this->addDate = $addDate;
        $this->content = $content;
    }

/* Getters */
    function getCommentID() {
        return $this->commentID;
    }

    function getRecipeID() {
        return $this->recipeID;
    }

    function getUserID() {
        return $this->userID;
    }

    function getAddDate() {
        return $this->addDate;
    }

    function getContent() {
        return $this->content;
    }

    function getFullname() {
        return $this->fullname;
    }

/* Setters */
    function setCommentID($commentID) {
        return $this->commentID = $commentID;
    }

    function setRecipeID($recipeID) {
        return $this->recipeID = $recipeID;
    }

    function setUserID($userID) {
        return $this->userID = $userID;
    }

    function setAddDate($addDate) {
        return $this->addDate = $addDate;
    }

    function setContent($content) {
        return $this->content = $content;
    }

    function setFullname($fullname) {
        return $this->fullname = $fullname;
    }
};
?>