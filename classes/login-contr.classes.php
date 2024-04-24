<?php

class LoginContr extends Login {

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    //vypis errorov
    public function loginUser() {
        if ($this->emptyInput() == false) {
            header("location: ../prihlasenie.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->uid, $this->pwd) ;
    }

    //prazdne polia error handler
    private function emptyInput() {
        $result = false;
        if (empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

 
}