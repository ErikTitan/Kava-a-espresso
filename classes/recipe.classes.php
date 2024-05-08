<?php

class Recipe extends Dbh{
    //vlozenie receptu do databazy
    protected function setRecipe($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId){
        $stmt = $this->connect()->prepare('INSERT INTO coffee_recipes (roast_type, water_amount, coffee_amount, recipe_name, users_id) VALUES (?,?,?,?,?);');
    
        if (!$stmt->execute(array($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId))) {
            $stmt = null;
            header("location: ../recepty.php?rec_error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }
    

    //kontorla ak recept existuje
    protected function checkRecipe($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId){
        $stmt = $this->connect()->prepare('SELECT * FROM coffee_recipes WHERE roast_type = ? AND water_amount = ? AND coffee_amount = ? OR recipe_name =? AND users_id =?;');

        if (!$stmt->execute(array($roast_type, $water_amount, $coffee_amount, $recipe_name, $userId))) {
            $stmt = null;
               header("location: ../recepty.php?rec_error=stmtfailed");
           exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
  
    }

    public function getRecipe($userId){
        $stmt = $this->connect()->prepare('SELECT roast_type, water_amount, coffee_amount, recipe_name FROM coffee_recipes WHERE users_id = ?;');
        
        if (!$stmt->execute([$userId])) {
            $stmt = null;
            header("location: ../recepty.php?rec_error=stmtfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}