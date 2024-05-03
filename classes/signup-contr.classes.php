<?php

class SignupContr extends Signup {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $cleanUid;

    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    //vypis errorov
    public function signupUser() {
        if ($this->invalidUid() == false) {
            header("location: ../prihlasenie.php?reg_error=Nepodporované znaky v mene");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../prihlasenie.php?reg_error=nesprávny email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../prihlasenie.php?reg_error=Vaše heslá sa nezhodujú");
            exit();
        }
        if ($this->checkPasswordStrength() == false) {
            header("location: ../prihlasenie.php?reg_error=Heslo musí obsahovať minimálne 8 znakov, 1 číslo a 1 špeciálny znak");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../prihlasenie.php?reg_error=Používateľské meno už existuje");
            exit();
        }
        //odstranenie medzier z mena
        $this->cleanUid = str_replace(' ', '', $this->uid);
        //odoslanie do signup.classes.php
        $this->setUser($this->cleanUid, $this->pwd, $this->email);
    }
    
    // nepodporovane znaky error handler
    private function invalidUid() {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->cleanUid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;

    }

    // spravny email error handler
    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // rovnake heslo error handler
    private function pwdMatch() {
        $result = false;
        if ($this->pwd!== $this->pwdRepeat) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // sila hesla error handler
    private function checkPasswordStrength() {
        // potrebne parametre hesla
        $uppercase = preg_match('@[A-Z]@', $this->pwd);
        $lowercase = preg_match('@[a-z]@', $this->pwd);
        $number = preg_match('@[0-9]@', $this->pwd);
        $specialChar = preg_match('@[^\w]@', $this->pwd);
        
        // minimalna dlzka hesla
        $minLength = 8;
        
        if ($uppercase && $lowercase && $number && $specialChar && strlen($this->pwd) >= $minLength) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // zabrane meno error handler
    private function uidTakenCheck() {
        $result = false;
        // checkUser classa z signup.classes.php
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}