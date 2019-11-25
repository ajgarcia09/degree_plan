<?php
require_once 'header.php';
require_once 'functions.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

var_dump($_POST);
update_first_attempt();
update_second_attempt();
update_third_attempt();
update_grades();

function update_first_attempt(){
    if(isset($_POST['MATH_1312_+_one'])){
        $first = $_POST['MATH_1312_+_one'];
        queryMysql("UPDATE othermath SET one='$first' WHERE coursenum='MATH 1312 +';");
    }
    if(isset($_POST['MATH_3323_+_one'])){
        $first = $_POST['MATH_3323_+_one'];
        queryMysql("UPDATE othermath SET one='$first' WHERE coursenum='MATH 3323 +';");
    }
    if(isset($_POST['MATH_4329_one'])){
        $first = $_POST['MATH_4329_one'];
        queryMysql("UPDATE othermath SET one='$first' WHERE coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_one'])){
        $first = $_POST['STAT_3320_one'];
        queryMysql("UPDATE othermath SET one='$first' WHERE coursenum='STAT 3320';");
    }
}

function update_second_attempt(){
    if(isset($_POST['MATH_1312_+_two'])){
        $second = $_POST['MATH_1312_+_two'];
        queryMysql("UPDATE othermath SET two='$second' WHERE coursenum='MATH 1312 +';");
    }
    if(isset($_POST['MATH_3323_+_two'])){
        $second = $_POST['MATH_3323_+_two'];
        queryMysql("UPDATE othermath SET two='$second' WHERE coursenum='MATH 3323 +';");
    }
    if(isset($_POST['MATH_4329_two'])){
        $second = $_POST['MATH_4329_two'];
        queryMysql("UPDATE othermath SET two='$second' WHERE coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_two'])){
        $second = $_POST['STAT_3320_two'];
        queryMysql("UPDATE othermath SET two='$second' WHERE coursenum='STAT 3320';");
    }
}

function update_third_attempt(){
    if(isset($_POST['MATH_1312_+_three'])){
        $third = $_POST['MATH_1312_+_three'];
        queryMysql("UPDATE othermath SET three='$third' WHERE coursenum='MATH 1312 +';");
    }
    if(isset($_POST['MATH_3323_+_three'])){
        $third = $_POST['MATH_3323_+_three'];
        queryMysql("UPDATE othermath SET three='$third' WHERE coursenum='MATH 3323 +';");
    }
    if(isset($_POST['MATH_4329_three'])){
        $third = $_POST['MATH_4329_three'];
        queryMysql("UPDATE othermath SET three='$third' WHERE coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_three'])){
        $third = $_POST['STAT_3320_three'];
        queryMysql("UPDATE othermath SET three='$third' WHERE coursenum='STAT 3320';");
    }
}

function update_grades(){
    if(isset($_POST['MATH_1312_+_GR'])){
        $grade = $_POST['MATH_1312_+_GR'];
        queryMysql("UPDATE othermath SET GR='$grade' WHERE coursenum='MATH 1312 +';");
    }
    if(isset($_POST['MATH_3323_+_GR'])){
        $grade = $_POST['MATH_3323_+_GR'];
        queryMysql("UPDATE othermath SET GR='$grade' WHERE coursenum='MATH 3323 +';");
    }
    if(isset($_POST['MATH_4329_GR'])){
        $grade = $_POST['MATH_4329_GR'];
        queryMysql("UPDATE othermath SET GR='$grade' WHERE coursenum='MATH 4329';");
    }
    if(isset($_POST['STAT_3320_GR'])){
        $grade = $_POST['STAT_3320_GR'];
        queryMysql("UPDATE othermath SET GR='$grade' WHERE coursenum='STAT 3320';");
    }
}
print_table_for_edit("SELECT * FROM othermath", "Other Required Mathematics Courses (12)","edit_math.php");

$connection->close();
?>