<?php
session_start();
if(isset($_POST['submit'])) {

    $userId = $_SESSION['userid'];
    //zachytavanie dat z formularu
    $roast_type = $_POST['roast_type'];
    $water_amount = $_POST['water_amount'];
    $coffee_amount = $_POST['coffee_amount'];
    $recipe_name = $_POST['recipe_name'];

    include "../classes/config.php";
    include "../classes/recipe.classes.php";
    include "../classes/recipe-contr.classes.php";
    $recipe = new RecipeContr($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId);
    // error handler
    $recipe->addRecipe();

    //vrateniena stranku
    header("location:../recepty.php");
}
