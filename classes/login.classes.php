<?php

class Login extends Dbh{
    //SELECT usera z databazy
    protected function getUser($uid,$pwd){
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? or users_email = ?;');

        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../prihlasenie.php?log_error=stmtfailed");
            exit();
        }
        // ak nebol najdeny user
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../prihlasenie.php?log_error=Zle zadané meno alebo heslo");
            exit();
        }
        
        //porovnavanie hesla
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);

        if ($checkPwd == false) {

            $stmt = null;
            header("location: ../prihlasenie.php?log_error= Zle zadané meno alebo heslo");
            exit();
        }
        elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? or users_email = ? AND users_pwd = ?;');

            if (!$stmt->execute(array($uid, $uid, $pwd))) {

                $stmt = null;
                
                header("location: ../prihlasenie.php?log_error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../prihlasenie.php?log_error=Pouźívateľ nebol najdený");	
                exit();

            }
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['useruid'] = $user[0]['users_uid'];
            $_SESSION['admin'] = $user[0]['admin'];// admin status

            $stmt = null;
        }

        $stmt = null;
    }

}