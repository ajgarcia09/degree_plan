<?php

session_start();

echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';

$userstr = ' (Guest) ';

//if a user is logged in, display the user's name
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
}
else $loggedin = FALSE;

echo "<title>$appname$userstr</title><link rel='stylesheet'" .
    "href='styles.css' type='text/css'>" . 
    "</head><body><center><canvas id='logo' width='624' " .
    "height='96'>$appname</canvas></center>" .
    "<div class='appname'>$appname$userstr</div>" .
    "<script src='javascript.js'></script>";

if($loggedin)
    echo "<br ><ul class='menu'>" .
    "<li><a href='members.php?view=$user'>Home</a></li>" .
    "<li><a href='logout.php'>Log out</a></li></ul><br>";
else
    echo "<br><ul class='menu'>" .
        "<li><a href='index.php'>Home</a></li>" .
        "<li><a href='signup.php'>Sign Up</a></li>" .
        "<li><a href='login.php'>Log in</a></li>" .
        "<li><a href='logout.php'>Log out</a></li><br><br>" .
        "<span class='info'>&#8658; You must be logged in to " .
        "view this page.</span><br><br>";





?>