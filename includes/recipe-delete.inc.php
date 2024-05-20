<?php
session_start();
if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    include '../classes/config.php';
    include "../classes/recipe.classes.php";
    $recipeId = $_GET['id'];

    $dbhconnect = new Dbh();


    function deleteData($dbhconnect,$id) {
        try {
            $sql = "DELETE FROM coffee_recipes WHERE recipe_id = ?;";
            $stmt = $dbhconnect->connect()->prepare($sql);
            $stmt->execute([$id]);
            header("location: ../recepty.php");
            
        } catch (PDOException $e) { echo $e;
        }
    }

    deleteData($dbhconnect,$recipeId);
}