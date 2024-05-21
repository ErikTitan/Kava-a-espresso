<?php
session_start();
if(isset($_SESSION['userid'])){
    $userId = $_SESSION['userid'];
    include '../classes/config.php';
    include "../classes/recipe.classes.php";
    include "../classes/recipe-contr.classes.php";
    $roastType = $_POST['roast_type'];
    $waterAmount = $_POST['water_amount'];
    $coffeeAmount = $_POST['coffee_amount'];
    $recipeName = $_POST['recipe_name'];
    $recipeId = $_POST['recipe_id'];


    $dbhconnect = new Dbh();

    $recipe = new RecipeContr($roastType, $waterAmount, $coffeeAmount, $recipeName, $userId);
    // volanie edit recipe z recipe-contr.classes.php
    $recipe->editRecipe();

    // uprava receptu v databaze
    function updateRecipe($dbhconnect, $recipeId, $roastType, $waterAmount, $coffeeAmount, $recipeName) {
        $stmt = $dbhconnect->connect()->prepare('UPDATE coffee_recipes SET roast_type = ?, water_amount = ?, coffee_amount = ?, recipe_name = ? WHERE recipe_id = ?;');
        
        if (!$stmt->execute([$roastType, $waterAmount, $coffeeAmount, $recipeName, $recipeId])) {
            $stmt = null;
            header("location: ../recepty.php?rec_error=stmtfailed");
            exit();
        }
        header("location: ../recepty.php");
    }

    updateRecipe($dbhconnect, $recipeId, $roastType, $waterAmount, $coffeeAmount, $recipeName);
}