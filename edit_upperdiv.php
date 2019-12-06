<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

//currently logged in user
$user = $_SESSION['user'];

update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
print_table_for_edit("SELECT * FROM upperdiv WHERE user='$user'", "Upper Division Requirements (23)","edit_upperdiv.php");


function update_first_attempt($user){
    if(isset($_POST['CS_3195_one']) &&
        $_POST['CS_3195_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 3195';")){
        $first = sanitizeString($_POST['CS_3195_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331+_one']) &&
        $_POST['CS_3331+_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 3331+';")){
        $first = sanitizeString($_POST['CS_3331+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 3331+';");
    }
    if(isset($_POST['CS_3350_one']) &&
        $_POST['CS_3350_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 3350';")){
        $first = sanitizeString($_POST['CS_3350_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_one']) &&
        $_POST['CS_3360_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 3360';")){
        $first = sanitizeString($_POST['CS_3360_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432+_one']) &&
        $_POST['CS_3432+_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 3432';")){
        $first = sanitizeString($_POST['CS_3432+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 3432+';");
    }
    if(isset($_POST['CS_4310+_one']) &&
        $_POST['CS_4310+_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 4310+';")){
        $first = sanitizeString($_POST['CS_4310+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 4310+';");
    }
    if(isset($_POST['CS_4311_one']) &&
        $_POST['CS_4311_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 4311';")){
        $first = sanitizeString($_POST['CS_4311_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_one']) &&
        $_POST['CS_4375_one'] != queryMysql("SELECT one FROM upperdiv WHERE user='$user' AND coursenum='CS 4375';")){
        $first = sanitizeString($_POST['CS_4375_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE user='$user' AND coursenum='CS 4375';");
    }
}

function update_second_attempt($user){
    if(isset($_POST['CS_3195_two']) &&
        $_POST['CS_3195_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 3195';")){
        $second = sanitizeString($_POST['CS_3195_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331+_two']) &&
        $_POST['CS_3331+_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 3331+';")){
        $second = sanitizeString($_POST['CS_3331+_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 3331+';");
    }
    if(isset($_POST['CS_3350_two']) &&
        $_POST['CS_3350_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 3350';")){
        $second = sanitizeString($_POST['CS_3350_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_two']) &&
        $_POST['CS_3360_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 3360';")){
        $second = sanitizeString($_POST['CS_3360_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432+_two']) &&
        $_POST['CS_3432+_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 3432';")){
        $second = sanitizeString($_POST['CS_3432+_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 3432+';");
    }
    if(isset($_POST['CS_4310+_two']) &&
        $_POST['CS_4310+_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 4310+';")){
        $second= sanitizeString($_POST['CS_4310+_one']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 4310+';");
    }
    if(isset($_POST['CS_4311_two']) &&
        $_POST['CS_4311_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 4311';")){
        $second = sanitizeString($_POST['CS_4311_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_two']) &&
        $_POST['CS_4375_two'] != queryMysql("SELECT two FROM upperdiv WHERE user='$user' AND coursenum='CS 4375';")){
        $second = sanitizeString($_POST['CS_4375_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE user='$user' AND coursenum='CS 4375';");
    }
}

function update_third_attempt($user){
    if(isset($_POST['CS_3195_three']) &&
        $_POST['CS_3195_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 3195';")){
        $third = sanitizeString($_POST['CS_3195_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331+_three']) &&
        $_POST['CS_3331+_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 3331+';")){
        $third = sanitizeString($_POST['CS_3331+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 3331+';");
    }
    if(isset($_POST['CS_3350_three']) &&
        $_POST['CS_3350_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 3350';")){
        $third = sanitizeString($_POST['CS_3350_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_three']) &&
        $_POST['CS_3360_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 3360';")){
        $third = sanitizeString($_POST['CS_3360_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432+_three']) &&
        $_POST['CS_3432+_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 3432';")){
        $third = sanitizeString($_POST['CS_3432+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 3432+';");
    }
    if(isset($_POST['CS_4310+_three']) &&
        $_POST['CS_4310+_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 4310+';")){
        $third= sanitizeString($_POST['CS_4310+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 4310+';");
    }
    if(isset($_POST['CS_4311_three']) &&
        $_POST['CS_4311_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 4311';")){
        $third = sanitizeString($_POST['CS_4311_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_three']) &&
        $_POST['CS_4375_three'] != queryMysql("SELECT three FROM upperdiv WHERE user='$user' AND coursenum='CS 4375';")){
        $third = sanitizeString($_POST['CS_4375_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE user='$user' AND coursenum='CS 4375';");
    }
    
}

function update_grades($user){
    if(isset($_POST['CS_3195_GR']) &&
        $_POST['CS_3195_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 3195';")){
        $grade = sanitizeString($_POST['CS_3195_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331+_GR']) &&
        $_POST['CS_3331+_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 3331+';")){
        $grade = sanitizeString($_POST['CS_3331+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 3331+';");
    }
    if(isset($_POST['CS_3350_GR']) &&
        $_POST['CS_3350_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 3350';")){
        $grade = sanitizeString($_POST['CS_3350_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_GR']) &&
        $_POST['CS_3360_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 3360';")){
        $grade = sanitizeString($_POST['CS_3360_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432+_GR']) &&
        $_POST['CS_3432+_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 3432';")){
        $grade = sanitizeString($_POST['CS_3432+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 3432+';");
    }
    if(isset($_POST['CS_4310+_GR']) &&
        $_POST['CS_4310+_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 4310+';")){
        $grade= sanitizeString($_POST['CS_4310+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 4310+';");
    }
    if(isset($_POST['CS_4311_GR']) &&
        $_POST['CS_4311_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 4311';")){
        $grade = sanitizeString($_POST['CS_4311_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_GR']) &&
        $_POST['CS_4375_GR'] != queryMysql("SELECT GR FROM upperdiv WHERE user='$user' AND coursenum='CS 4375';")){
        $grade = sanitizeString($_POST['CS_4375_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 4375';");
    }
}

?>