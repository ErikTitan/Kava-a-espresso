<?php
if(isset($_POST['submit'])) {
    //zachytavanie dat z formularu
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    include "../classes/config.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
    // error handler
    $signup->signupUser();

    //vrateniena stranku recepty.php
    header("location:../recepty.php");
}
