<?php
if(isset($_POST['submit'])) {
    //zachytavanie dat z formularu
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // SignupContr class
    include "../classes/config.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // error handler
    $login->loginUser();

    //vrateniena stranku
    header("location:../index.php?error=none");
}