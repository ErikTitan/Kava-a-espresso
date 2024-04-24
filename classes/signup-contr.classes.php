<?php

class SignupContr extends Signup {

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    //vypis errorov
    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../prihlasenie.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../prihlasenie.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../prihlasenie.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../prihlasenie.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../prihlasenie.php?error=useroremailtaken");
            exit();
        }
        $this->setUser($this->uid, $this->pwd, $this->email) ;
    }

    //prazdne polia error handler
    private function emptyInput() {
        $result = false;
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // spravne meno error handler
    private function invalidUid() {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
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

    private function uidTakenCheck() {
        $result = false;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}