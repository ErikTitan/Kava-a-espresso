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
        
        $this->getUser($this->uid, $this->pwd) ;
    }
 
}