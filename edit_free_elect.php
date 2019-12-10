<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);
$user = $_SESSION['user'];
update_free_elect($user);
show_form_edit_example();
print_freeelect_table_for_edit("SELECT * FROM freeelect  WHERE user='$user'", "Free Electives (3)*","edit_free_elect.php");


function update_free_elect($user){
    if(isset($_POST['freenum']) &&
        $_POST['freenum'] != queryMysql("SELECT coursenum FROM freeelect WHERE user='$user' AND HR=3;")){
            $freenum = sanitizeString($_POST['freenum']);
            queryMysql("UPDATE freeelect SET coursenum='$freenum' WHERE user='$user' AND HR=3;");
    }
    if(isset($_POST['freename']) &&
        $_POST['freename'] != queryMysql("SELECT coursename FROM freeelect WHERE user='$user' AND HR=3;")){
            $freename = sanitizeString($_POST['freename']);
            queryMysql("UPDATE freeelect SET coursename='$freename' WHERE user='$user' AND HR=3;");
    }
    if(isset($_POST['first']) &&
        $_POST['first'] != queryMysql("SELECT one FROM freeelect WHERE user='$user' AND HR=3;")){
            $first = sanitizeString($_POST['first']);
            queryMysql("UPDATE freeelect SET one='$first' WHERE user='$user' AND HR=3;");
    }
    if(isset($_POST['second']) &&
        $_POST['second'] != queryMysql("SELECT two FROM freeelect WHERE user='$user' AND HR=3;")){
            $second = sanitizeString($_POST['second']);
            queryMysql("UPDATE freeelect SET two='$second' WHERE user='$user' AND HR=3;");
    }
    if(isset($_POST['third']) &&
        $_POST['third'] != queryMysql("SELECT three FROM freeelect WHERE user='$user' AND HR=3;")){
            $third = sanitizeString($_POST['third']);
            queryMysql("UPDATE freeelect SET three='$third' WHERE user='$user' AND HR=3;");
    }
    if(isset($_POST['grade']) &&
        $_POST['grade'] != queryMysql("SELECT two FROM freeelect WHERE user='$user' AND HR=3;")){
            $grade = sanitizeString($_POST['grade']);
            queryMysql("UPDATE freeelect SET GR='$grade' WHERE user='$user' AND HR=3;");
    }
}

?>