<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
var_dump($_POST);
update_course_num($user);
update_course_name($user);
update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
print_sciences_table_for_edit("SELECT * FROM sciences WHERE user='$user'", "Life & Physical Sciences (12)*","edit_sciences.php");

function update_course_num($user){
    if(isset($_POST['coursenum_science1']) &&
        $_POST['coursenum_science1'] != queryMysql("SELECT coursenum FROM sciences WHERE user='$user' AND hidden='science1';")){
            $coursenum = sanitizeString($_POST['coursenum_science1']);
            queryMysql("UPDATE sciences SET coursenum='$coursenum' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['coursenum_science2']) &&
        $_POST['coursenum_science2'] != queryMysql("SELECT coursenum FROM sciences WHERE user='$user' AND hidden='science2';")){
            $coursenum = sanitizeString($_POST['coursenum_science2']);
            queryMysql("UPDATE sciences SET coursenum='$coursenum' WHERE user='$user' AND hidden='science2';");
    }
}

function update_course_name($user){
    if(isset($_POST['coursename_science1']) &&
        $_POST['coursename_science1'] != queryMysql("SELECT coursename FROM sciences WHERE user='$user' AND hidden='science1';")){
            $coursename = sanitizeString($_POST['coursename_science1']);
            queryMysql("UPDATE sciences SET coursename='$coursename' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['coursename_science2']) &&
        $_POST['coursename_science2'] != queryMysql("SELECT coursename FROM sciences WHERE user='$user' AND hidden='science2';")){
            $coursename = sanitizeString($_POST['coursename_science2']);
            queryMysql("UPDATE sciences SET coursename='$coursename' WHERE user='$user' AND hidden='science2';");
    }
}

function update_first_attempt($user){
    if(isset($_POST['PHYS_2420_one']) &&
        $_POST['PHYS_2420_one'] != queryMysql("SELECT one FROM sciences WHERE user='$user' AND coursenum='PHYS 2420';")){
            $first = sanitizeString($_POST['PHYS_2420_one']);
            queryMysql("UPDATE sciences SET one='$first' WHERE user='$user' AND coursenum='PHYS 2420';");
    }
    if(isset($_POST['first_science1']) &&
        $_POST['first_science1'] != queryMysql("SELECT one FROM sciences WHERE user='$user' AND hidden='science1';")){
            $first = sanitizeString($_POST['first_science1']);
            queryMysql("UPDATE sciences SET one='$first' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['first_science2']) &&
        $_POST['first_science2'] != queryMysql("SELECT one FROM sciences WHERE user='$user' AND hidden='science2';")){
            $first = sanitizeString($_POST['first_science2']);
            queryMysql("UPDATE sciences SET one='$first' WHERE user='$user' AND hidden='science2';");
    }
}

function update_second_attempt($user){
    if(isset($_POST['PHYS_2420_two']) &&
        $_POST['PHYS_2420_two'] != queryMysql("SELECT two FROM sciences WHERE user='$user' AND coursenum='PHYS 2420';")){
            $second = sanitizeString($_POST['PHYS_2420_two']);
            queryMysql("UPDATE sciences SET two='$second' WHERE user='$user' AND coursenum='PHYS 2420';");
    }
    if(isset($_POST['second_science1']) &&
        $_POST['second_science1'] != queryMysql("SELECT two FROM sciences WHERE user='$user' AND hidden='science1';")){
            $second = sanitizeString($_POST['second_science1']);
            queryMysql("UPDATE sciences SET two='$second' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['second_science2']) &&
        $_POST['second_science2'] != queryMysql("SELECT two FROM sciences WHERE user='$user' AND hidden='science2';")){
            $second = sanitizeString($_POST['second_science2']);
            queryMysql("UPDATE sciences SET two='$second' WHERE user='$user' AND hidden='science2';");
    }
}

function update_third_attempt($user){
    if(isset($_POST['PHYS_2420_three']) &&
        $_POST['PHYS_2420_three'] != queryMysql("SELECT three FROM sciences WHERE user='$user' AND coursenum='PHYS 2420';")){
            $third = sanitizeString($_POST['PHYS_2420_three']);
            queryMysql("UPDATE sciences SET three='$third' WHERE user='$user' AND coursenum='PHYS 2420';");
    }
    if(isset($_POST['third_science1']) &&
        $_POST['third_science1'] != queryMysql("SELECT three FROM sciences WHERE user='$user' AND hidden='science1';")){
            $third = sanitizeString($_POST['third_science1']);
            queryMysql("UPDATE sciences SET three='$third' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['third_science2']) &&
        $_POST['third_science2'] != queryMysql("SELECT three FROM sciences WHERE user='$user' AND hidden='science2';")){
            $third = sanitizeString($_POST['third_science2']);
            queryMysql("UPDATE sciences SET three='$third' WHERE user='$user' AND hidden='science2';");
    }
}

function update_grades($user){
    if(isset($_POST['PHYS_2420_GR']) &&
        $_POST['PHYS_2420_GR'] != queryMysql("SELECT GR FROM sciences WHERE user='$user' AND coursenum='PHYS 2420';")){
            $grade = sanitizeString($_POST['PHYS_2420_GR']);
            queryMysql("UPDATE sciences SET GR='$grade' WHERE user='$user' AND coursenum='PHYS 2420';");
    }
    if(isset($_POST['grade_science1']) &&
        $_POST['grade_science1'] != queryMysql("SELECT GR FROM sciences WHERE user='$user' AND hidden='science1';")){
            $grade = sanitizeString($_POST['grade_science1']);
            queryMysql("UPDATE sciences SET GR='$grade' WHERE user='$user' AND hidden='science1';");
    }
    if(isset($_POST['grade_science2']) &&
        $_POST['grade_science2'] != queryMysql("SELECT GR FROM sciences WHERE user='$user' AND hidden='science2';")){
            $third = sanitizeString($_POST['grade_science2']);
            queryMysql("UPDATE sciences SET GR='$third' WHERE user='$user' AND hidden='science2';");
    }
}


   

?>