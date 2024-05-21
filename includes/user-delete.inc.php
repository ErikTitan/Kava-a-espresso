<?php
session_start();

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    if (isset($_GET['id'])) {
        include '../classes/config.php';
        $dbhconnect = new Dbh();
            function deleteUser($dbhconnect, $userId) {
                try {
                    // vymazanie pouzivatelovych receptov
                    $sql_delete_recipes = "DELETE FROM coffee_recipes WHERE users_id = ?";
                    $stmt_delete_recipes = $dbhconnect->connect()->prepare($sql_delete_recipes);
                    $stmt_delete_recipes->execute([$userId]);
                    
                    // vymazanie pouzivatela
                    $sql_delete_user = "DELETE FROM users WHERE users_id = ?";
                    $stmt_delete_user = $dbhconnect->connect()->prepare($sql_delete_user);
                    $stmt_delete_user->execute([$userId]);

                    header("Location: ../admin.php");
                    exit();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

        deleteUser($dbhconnect , $_GET['id']);
    } else {
        header("Location: ../admin.php");
        exit();
    }
} else {
    header("Location: ../prihlasenie.php");
    exit();
}

