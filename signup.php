<?php    // signup.php

session_start();
$_SESSION ['err'] = '';

require_once 'Util.php';
require_once 'User.php';

$atxcc_us = new User ();

if ($_POST) {

    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $email = $_POST ['email'];
    $mobile = $_POST ['mobile'];

    $err = '';

    $server = $_SERVER ['SERVER_NAME'];
    $urlRedirect = 'http://' . $server . '/atxcc';

    if ($atxcc_us -> userExists ($username)) {

        $err = "user: '$username' already exists";
        $urlRedirect = $urlRedirect . '/signup';

    } else {

        $atxcc_us -> registerUser ($username, $password, $email, $mobile);

    } // end if ($atxcc_us -> userExists ($username))
    
    $_SESSION ['err'] = $err;

    Util::redirect ($urlRedirect); 

} // end if ($_POST)

