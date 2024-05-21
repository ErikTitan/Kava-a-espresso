<?php

class RecipeContr extends Recipe {

    private $roast_type;
    private $water_amount;
    private $coffee_amount;
    private $recipe_name;
    private $userId;

    public function __construct($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId) {
        $this->roast_type = $roast_type;
        $this->water_amount = $water_amount;
        $this->coffee_amount = $coffee_amount;
        $this->recipe_name = $recipe_name;
        $this->userId = $userId;
    }

    //vypis errorov
    public function addRecipe() {
        if ($this->recipeTakenCheck() == true) {
            header("location: ../recepty.php?rec_error=Recept už existuje");
            exit();
        }
        if ($this->checkRecipeLength() == false) {
            header("location: ../recepty.php?rec_error=Príliš dlhý názov");
            exit();
        }
        if ($this->checkRoastType() == false) {
            header("location: ../recepty.php?rec_error=Nesprávný typ prazenia");
            exit();
        }
        
        //odoslanie do recipe.classes.php
        $this->setRecipe($this->roast_type, $this->water_amount, $this->coffee_amount, $this->recipe_name, $this->userId);
    }

    // uprava existujucich receptov
    public function editRecipe() {
        if ($this->recipeNameTakenCheck() == true) {
            header("location: ../recepty.php?rec_error=Recept už existuje");
            exit();
        }
        if ($this->checkRecipeLength() == false) {
            header("location: ../recepty.php?rec_error=Príliš dlhý názov");
            exit();
        }
        if ($this->checkRoastType() == false) {
            header("location: ../recepty.php?rec_error=Nesprávný typ prazenia");
            exit();
        }

    }

    // existujuci recept error handler (pre pridanie receptu)
    private function recipeTakenCheck() {
        // checkRecipe classa z recipe.classes.php
        return $this->checkRecipe($this->roast_type, $this->water_amount, $this->coffee_amount, $this->userId, $this->recipe_name);
       
    }
    // existujuce meno error handler (pre edit receptu)
    private function recipeNameTakenCheck() {
        // checkRecipeName classa z recipe.classes.php
        return $this->checkRecipeName($this->roast_type, $this->water_amount, $this->coffee_amount, $this->userId, $this->recipe_name);
       
    }

    // dlzka nazvu error handler
    private function checkRecipeLength() {
        // maximalna dlzka nazvu
        $maxLength = 50;
        
        if (strlen($this->recipe_name) <= $maxLength) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // spravny typ prazenia
    private function checkRoastType() {
        $result = false;
        if ($this->roast_type == "light" || $this->roast_type == "medium" || $this->roast_type == "dark") {
            $result = true;
        }
        return $result;
    }
   
}