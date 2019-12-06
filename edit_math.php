<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
print_table_for_edit("SELECT * FROM othermath WHERE user='$user'", "Other Required Mathematics Courses (12)","edit_math.php");

function update_first_attempt($user){
    if(isset($_POST['MATH_1312+_one']) &&
        $_POST['MATH_1312+_one'] != queryMysql("SELECT one FROM othermath WHERE user='$user' AND coursenum='MATH 1312+';")){
        $first = sanitizeString($_POST['MATH_1312+_one']);
        queryMysql("UPDATE othermath SET one='$first' WHERE user='$user' AND coursenum='MATH 1312+';");
    }
    if(isset($_POST['MATH_3323+_one']) &&
        $_POST['MATH_3323+_one'] != queryMysql("SELECT one FROM othermath WHERE user='$user' AND coursenum='MATH 3323+';")){
        $first = sanitizeString($_POST['MATH_3323+_one']);
        queryMysql("UPDATE othermath SET one='$first' WHERE user='$user' AND coursenum='MATH 3323+';");
    }
    if(isset($_POST['MATH_4329_one']) &&
        $_POST['MATH_4329_one'] != queryMysql("SELECT one FROM othermath WHERE user='$user' AND coursenum='MATH 4329';")){
        $first = sanitizeString($_POST['MATH_4329_one']);
        queryMysql("UPDATE othermath SET one='$first' WHERE user='$user' AND coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_one']) &&
        $_POST['STAT_3320_one'] != queryMysql("SELECT one FROM othermath WHERE user='$user' AND coursenum='STAT 3320';")){
        $first = sanitizeString($_POST['STAT_3320_one']);
        queryMysql("UPDATE othermath SET one='$first' WHERE user='$user' AND coursenum='STAT 3320';");
    }
}

function update_second_attempt($user){
    if(isset($_POST['MATH_1312+_two']) &&
        $_POST['MATH_1312+_two'] != queryMysql("SELECT two FROM othermath WHERE user='$user' AND coursenum='MATH 1312+';")){
        $second = sanitizeString($_POST['MATH_1312+_two']);
        queryMysql("UPDATE othermath SET two='$second' WHERE user='$user' AND coursenum='MATH 1312+';");
    }
    if(isset($_POST['MATH_3323+_two']) &&
        $_POST['MATH_3323+_two'] != queryMysql("SELECT two FROM othermath WHERE user='$user' AND coursenum='MATH 3323+';")){
        $second = sanitizeString($_POST['MATH_3323+_two']);
        queryMysql("UPDATE othermath SET two='$second' WHERE user='$user' AND coursenum='MATH 3323+';");
    }
    if(isset($_POST['MATH_4329_two']) &&
        $_POST['MATH_4329_two'] != queryMysql("SELECT two FROM othermath WHERE user='$user' AND coursenum='MATH 4329';")){
        $second = sanitizeString($_POST['MATH_4329_two']);
        queryMysql("UPDATE othermath SET two='$second' WHERE user='$user' AND coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_two']) &&
        $_POST['STAT_3320_two'] != queryMysql("SELECT two FROM othermath WHERE user='$user' AND coursenum='STAT 3320';")){
        $second = sanitizeString($_POST['STAT_3320_two']);
        queryMysql("UPDATE othermath SET two='$second' WHERE user='$user' AND coursenum='STAT 3320';");
    }
}

function update_third_attempt($user) {
    if(isset($_POST['MATH_1312+_three']) &&
        $_POST['MATH_1312+_three'] != queryMysql("SELECT three FROM othermath WHERE user='$user' AND coursenum='MATH 1312+';")){
        $third = sanitizeString($_POST['MATH_1312+_three']);
        queryMysql("UPDATE othermath SET three='$third' WHERE user='$user' AND coursenum='MATH 1312+';");
    }
    if(isset($_POST['MATH_3323+_three']) &&
        $_POST['MATH_3323+_three'] != queryMysql("SELECT three FROM othermath WHERE user='$user' AND coursenum='MATH 3323+';")){
        $third = sanitizeString($_POST['MATH_3323+_three']);
        queryMysql("UPDATE othermath SET three='$third' WHERE user='$user' AND coursenum='MATH 3323+';");
    }
    if(isset($_POST['MATH_4329_three']) &&
        $_POST['MATH_4329_three'] != queryMysql("SELECT three FROM othermath WHERE user='$user' AND coursenum='MATH 4329';")){
        $third = sanitizeString($_POST['MATH_4329_three']);
        queryMysql("UPDATE othermath SET three='$third' WHERE user='$user' AND coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_three']) &&
        $_POST['STAT_3320_three'] != queryMysql("SELECT three FROM othermath WHERE user='$user' AND coursenum='STAT 3320';")){
        $third = sanitizeString($_POST['STAT_3320_three']);
        queryMysql("UPDATE othermath SET three='$third' WHERE user='$user' AND coursenum='STAT 3320';");
    }
}

function update_grades($user){
    if(isset($_POST['MATH_1312+_GR']) &&
        $_POST['MATH_1312+_GR'] != queryMysql("SELECT GR FROM othermath WHERE user='$user' AND coursenum='MATH 1312+';")){
        $grade = sanitizeString($_POST['MATH_1312+_GR']);
        queryMysql("UPDATE othermath SET GR='$grade' WHERE user='$user' AND coursenum='MATH 1312+';");
    }
    if(isset($_POST['MATH_3323+_GR']) &&
        $_POST['MATH_3323+_GR'] != queryMysql("SELECT GR FROM othermath WHERE user='$user' AND coursenum='MATH 3323+';")){
        $grade = sanitizeString($_POST['MATH_3323+_GR']);
        queryMysql("UPDATE othermath SET GR='$grade' WHERE user='$user' AND coursenum='MATH 3323+';");
    }
    if(isset($_POST['MATH_4329_GR']) &&
        $_POST['MATH_4329_GR'] != queryMysql("SELECT GR FROM othermath WHERE user='$user' AND coursenum='MATH 4329';")){
        $grade = sanitizeString($_POST['MATH_4329_GR']);
        queryMysql("UPDATE othermath SET GR='$grade' WHERE user='$user' AND coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_GR']) &&
        $_POST['STAT_3320_GR'] != queryMysql("SELECT GR FROM othermath WHERE user='$user' AND coursenum='STAT 3320';")){
        $grade = sanitizeString($_POST['STAT_3320_GR']);
        queryMysql("UPDATE othermath SET GR='$grade' WHERE user='$user' AND coursenum='STAT 3320';");
    }
}


$connection->close();
?>