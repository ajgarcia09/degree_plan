<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
update_course_num($user);
update_course_name($user);
update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
show_form_edit_example();
print_techelect_table_for_edit("SELECT * FROM techelect WHERE user='$user'", "Technical Electives (15)*","edit_techelect.php");

function update_course_num($user){
    if(isset($_POST['coursenum_elect1']) &&
        $_POST['coursenum_elect1'] != queryMysql("SELECT coursenum FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $coursenum = sanitizeString($_POST['coursenum_elect1']);
            queryMysql("UPDATE techelect SET coursenum='$coursenum' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['coursenum_elect2']) &&
        $_POST['coursenum_elect2'] != queryMysql("SELECT coursenum FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $coursenum = sanitizeString($_POST['coursenum_elect2']);
            queryMysql("UPDATE techelect SET coursenum='$coursenum' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['coursenum_elect3']) &&
        $_POST['coursenum_elect3'] != queryMysql("SELECT coursenum FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $coursenum = sanitizeString($_POST['coursenum_elect3']);
            queryMysql("UPDATE techelect SET coursenum='$coursenum' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['coursenum_elect4']) &&
        $_POST['coursenum_elect4'] != queryMysql("SELECT coursenum FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $coursenum = sanitizeString($_POST['coursenum_elect4']);
            queryMysql("UPDATE techelect SET coursenum='$coursenum' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['coursenum_elect5']) &&
        $_POST['coursenum_elect5'] != queryMysql("SELECT coursenum FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $coursenum = sanitizeString($_POST['coursenum_elect5']);
            queryMysql("UPDATE techelect SET coursenum='$coursenum' WHERE user='$user' AND hidden='elect5';");
    }
}

function update_course_name($user){
    if(isset($_POST['coursename_elect1']) &&
        $_POST['coursename_elect1'] != queryMysql("SELECT coursename FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $coursename = sanitizeString($_POST['coursename_elect1']);
            queryMysql("UPDATE techelect SET coursename='$coursename' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['coursename_elect2']) &&
        $_POST['coursename_elect2'] != queryMysql("SELECT coursename FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $coursename = sanitizeString($_POST['coursename_elect2']);
            queryMysql("UPDATE techelect SET coursename='$coursename' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['coursename_elect3']) &&
        $_POST['coursename_elect3'] != queryMysql("SELECT coursename FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $coursename = sanitizeString($_POST['coursename_elect3']);
            queryMysql("UPDATE techelect SET coursename='$coursename' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['coursename_elect4']) &&
        $_POST['coursename_elect4'] != queryMysql("SELECT coursename FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $coursename = sanitizeString($_POST['coursename_elect4']);
            queryMysql("UPDATE techelect SET coursename='$coursename' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['coursename_elect5']) &&
        $_POST['coursename_elect5'] != queryMysql("SELECT coursename FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $coursename = sanitizeString($_POST['coursename_elect5']);
            queryMysql("UPDATE techelect SET coursename='$coursename' WHERE user='$user' AND hidden='elect5';");
    }
}

function update_first_attempt($user){
    if(isset($_POST['first_elect1']) &&
        $_POST['first_elect1'] != queryMysql("SELECT one FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $first = sanitizeString($_POST['first_elect1']);
            queryMysql("UPDATE techelect SET one='$first' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['first_elect2']) &&
        $_POST['first_elect2'] != queryMysql("SELECT one FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $first = sanitizeString($_POST['first_elect2']);
            queryMysql("UPDATE techelect SET one='$first' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['first_elect3']) &&
        $_POST['first_elect3'] != queryMysql("SELECT one FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $first = sanitizeString($_POST['first_elect3']);
            queryMysql("UPDATE techelect SET one='$first' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['first_elect4']) &&
        $_POST['first_elect4'] != queryMysql("SELECT one FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $first = sanitizeString($_POST['first_elect4']);
            queryMysql("UPDATE techelect SET one='$first' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['first_elect5']) &&
        $_POST['first_elect5'] != queryMysql("SELECT one FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $first = sanitizeString($_POST['first_elect5']);
            queryMysql("UPDATE techelect SET one='$first' WHERE user='$user' AND hidden='elect5';");
    }
}

function update_second_attempt($user){
    if(isset($_POST['second_elect1']) &&
        $_POST['second_elect1'] != queryMysql("SELECT two FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $second = sanitizeString($_POST['second_elect1']);
            queryMysql("UPDATE techelect SET two='$second' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['second_elect2']) &&
        $_POST['second_elect2'] != queryMysql("SELECT two FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $second = sanitizeString($_POST['second_elect2']);
            queryMysql("UPDATE techelect SET two='$second' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['second_elect3']) &&
        $_POST['second_elect3'] != queryMysql("SELECT two FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $second = sanitizeString($_POST['second_elect3']);
            queryMysql("UPDATE techelect SET two='$second' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['second_elect4']) &&
        $_POST['second_elect4'] != queryMysql("SELECT two FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $second = sanitizeString($_POST['second_elect4']);
            queryMysql("UPDATE techelect SET two='$second' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['second_elect5']) &&
        $_POST['second_elect5'] != queryMysql("SELECT two FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $second = sanitizeString($_POST['second_elect5']);
            queryMysql("UPDATE techelect SET two='$second' WHERE user='$user' AND hidden='elect5';");
    }    
}

function update_third_attempt($user){
    if(isset($_POST['third_elect1']) &&
        $_POST['third_elect1'] != queryMysql("SELECT three FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $third = sanitizeString($_POST['third_elect1']);
            queryMysql("UPDATE techelect SET three='$third' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['third_elect2']) &&
        $_POST['third_elect2'] != queryMysql("SELECT three FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $third = sanitizeString($_POST['third_elect2']);
            queryMysql("UPDATE techelect SET three='$third' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['third_elect3']) &&
        $_POST['third_elect3'] != queryMysql("SELECT three FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $third = sanitizeString($_POST['third_elect3']);
            queryMysql("UPDATE techelect SET three='$third' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['third_elect4']) &&
        $_POST['third_elect4'] != queryMysql("SELECT three FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $third = sanitizeString($_POST['third_elect4']);
            queryMysql("UPDATE techelect SET three='$third' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['third_elect5']) &&
        $_POST['third_elect5'] != queryMysql("SELECT three FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $third = sanitizeString($_POST['third_elect5']);
            queryMysql("UPDATE techelect SET three='$third' WHERE user='$user' AND hidden='elect5';");
    }
}

function update_grades($user){
    if(isset($_POST['grade_elect1']) &&
        $_POST['grade_elect1'] != queryMysql("SELECT GR FROM techelect WHERE user='$user' AND hidden='elect1';")){
            $grade = sanitizeString($_POST['grade_elect1']);
            queryMysql("UPDATE techelect SET GR='$grade' WHERE user='$user' AND hidden='elect1';");
    }
    if(isset($_POST['grade_elect2']) &&
        $_POST['grade_elect2'] != queryMysql("SELECT GR FROM techelect WHERE user='$user' AND hidden='elect2';")){
            $grade = sanitizeString($_POST['grade_elect2']);
            queryMysql("UPDATE techelect SET GR='$grade' WHERE user='$user' AND hidden='elect2';");
    }
    if(isset($_POST['grade_elect3']) &&
        $_POST['grade_elect3'] != queryMysql("SELECT GR FROM techelect WHERE user='$user' AND hidden='elect3';")){
            $grade = sanitizeString($_POST['grade_elect3']);
            queryMysql("UPDATE techelect SET GR='$grade' WHERE user='$user' AND hidden='elect3';");
    }
    if(isset($_POST['grade_elect4']) &&
        $_POST['grade_elect4'] != queryMysql("SELECT GR FROM techelect WHERE user='$user' AND hidden='elect4';")){
            $grade = sanitizeString($_POST['grade_elect4']);
            queryMysql("UPDATE techelect SET GR='$grade' WHERE user='$user' AND hidden='elect4';");
    }
    if(isset($_POST['grade_elect5']) &&
        $_POST['grade_elect5'] != queryMysql("SELECT GR FROM techelect WHERE user='$user' AND hidden='elect5';")){
            $grade = sanitizeString($_POST['grade_elect5']);
            queryMysql("UPDATE techelect SET GR='$grade' WHERE user='$user' AND hidden='elect5';");
    }
}

?>