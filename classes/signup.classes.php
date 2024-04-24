<?php

class Signup extends Dbh{
    //vlozenie usera do databazy
    protected function setUser($uid,$pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?,?,?);');
        //hashovanie hesla
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
               header("location: ../prihlasenie.php?error=stmtfailed");
           exit();
        }
        else {
            // Start session after successful registration
            session_start();
            $_SESSION['userid'] = $this->connect()->lastInsertId(); // Assuming users_id is AUTO_INCREMENT
            $_SESSION['useruid'] = $uid;}
            
        $stmt = null;
    }


    //kontorla ak user existuje
    protected function checkUser($uid,$email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid,$email))) {
            $stmt = null;
               header("location: ../prihlasenie.php?error=stmtfailed");
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
}