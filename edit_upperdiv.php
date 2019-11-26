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
print_table_for_edit("SELECT * FROM upperdiv", "Upper Division Requirements (23)","edit_upperdiv.php");


function update_first_attempt(){
    if(isset($_POST['CS_3195_one'])){
        $first = sanitizeString($_POST['CS_3195_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331_+_one'])){
        $first = sanitizeString($_POST['CS_3331_+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 3331 +';");
    }
    if(isset($_POST['CS_3350_one'])){
        $first = sanitizeString($_POST['CS_3350_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_one'])){
        $first = sanitizeString($_POST['CS_3360_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432_+_one'])){
        $first = sanitizeString($_POST['CS_3432_+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 3432 +';");
    }
    if(isset($_POST['CS_4310_+_one'])){
        $first = sanitizeString($_POST['CS_4310_+_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 4310 +';");
    }
    if(isset($_POST['CS_4311_one'])){
        $first = sanitizeString($_POST['CS_4311_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_one'])){
        $first = sanitizeString($_POST['CS_4375_one']);
        queryMysql("UPDATE upperdiv SET one='$first' WHERE coursenum='CS 4375';");
    }
}

function update_second_attempt(){
    if(isset($_POST['CS_3195_two'])){
        $second = sanitizeString($_POST['CS_3195_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331_+_two'])){
        $second = sanitizeString($_POST['CS_3331_+_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 3331 +';");
    }
    if(isset($_POST['CS_3350_two'])){
        $second = sanitizeString($_POST['CS_3350_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_two'])){
        $second = sanitizeString($_POST['CS_3360_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432_+_two'])){
        $second = sanitizeString($_POST['CS_3432_+_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 3432 +';");
    }
    if(isset($_POST['CS_4310_+_one'])){
        $second= sanitizeString($_POST['CS_4310_+_one']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 4310 +';");
    }
    if(isset($_POST['CS_4311_two'])){
        $second = sanitizeString($_POST['CS_4311_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_two'])){
        $second = sanitizeString($_POST['CS_4375_two']);
        queryMysql("UPDATE upperdiv SET two='$second' WHERE coursenum='CS 4375';");
    }
}

function update_third_attempt(){
    if(isset($_POST['CS_3195_three'])){
        $third = sanitizeString($_POST['CS_3195_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331_+_three'])){
        $third = sanitizeString($_POST['CS_3331_+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 3331 +';");
    }
    if(isset($_POST['CS_3350_three'])){
        $third = sanitizeString($_POST['CS_3350_three']);
        queryMysql("UPDATE upperdiv SET two='$third' WHERE coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_three'])){
        $third = sanitizeString($_POST['CS_3360_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432_+_three'])){
        $third = sanitizeString($_POST['CS_3432_+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 3432 +';");
    }
    if(isset($_POST['CS_4310_+_three'])){
        $third= sanitizeString($_POST['CS_4310_+_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 4310 +';");
    }
    if(isset($_POST['CS_4311_three'])){
        $third = sanitizeString($_POST['CS_4311_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_three'])){
        $third = sanitizeString($_POST['CS_4375_three']);
        queryMysql("UPDATE upperdiv SET three='$third' WHERE coursenum='CS 4375';");
    }
    
}

function update_grades(){
    if(isset($_POST['CS_3195_GR'])){
        $grade = sanitizeString($_POST['CS_3195_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 3195';");
    }
    if(isset($_POST['CS_3331_+_GR'])){
        $grade = sanitizeString($_POST['CS_3331_+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 3331 +';");
    }
    if(isset($_POST['CS_3350_GR'])){
        $grade = sanitizeString($_POST['CS_3350_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 3350';");
    }
    if(isset($_POST['CS_3360_GR'])){
        $grade = sanitizeString($_POST['CS_3360_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 3360';");
    }
    if(isset($_POST['CS_3432_+_GR'])){
        $grade = sanitizeString($_POST['CS_3432_+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 3432 +';");
    }
    if(isset($_POST['CS_4310_+_GR'])){
        $grade= sanitizeString($_POST['CS_4310_+_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 4310 +';");
    }
    if(isset($_POST['CS_4311_GR'])){
        $grade = sanitizeString($_POST['CS_4311_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 4311';");
    }
    if(isset($_POST['CS_4375_GR'])){
        $grade = sanitizeString($_POST['CS_4375_GR']);
        queryMysql("UPDATE upperdiv SET GR='$grade' WHERE coursenum='CS 4375';");
    }
}

?>