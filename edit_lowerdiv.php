<?php

require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

//the currently logged in user
$user = $_SESSION['user'];

update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
print_table_for_edit("SELECT * FROM lowerdiv WHERE user='$user'", "Lower Division Requirements (18)","edit_lowerdiv.php");

/*
 * Check if each text input field is 
 * set to a value and update it only
 * if it's a different value than what
 * is already stored in the database.
 * 
 * Code is a little complex, but 
 * saves overhead in unnecessary 
 * queries to insert values without
 * checking if they're different
 * than what is already stored in the database.
 */
function update_first_attempt($user){
    if(isset($_POST['CS_1401+_one']) && 
        $_POST['CS_1401+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='CS 1401+';")){
        $first = sanitizeString($_POST['CS_1401+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='CS 1401+';");
    }
    if(isset($_POST['CS_2401+_one']) &&
        $_POST['CS_2401+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='CS 2401+';")){
        $first = sanitizeString($_POST['CS_2401+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='CS 2401+';");
    }
    if(isset($_POST['MATH_2300+_one']) &&
        $_POST['MATH_2300+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='MATH 2300+';")){
        $first = sanitizeString($_POST['MATH_2300+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='MATH 2300+';");
    }
    if(isset($_POST['CS_2302+_one']) &&
        $_POST['CS_2302+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='CS 2302+';")){
        $first = sanitizeString($_POST['CS_2302+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='CS 2302+';");
    }
    if(isset($_POST['EE_2369+_one']) &&
        $_POST['EE_2369+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='EE 2369+';")){
        $first = sanitizeString($_POST['EE_2369+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='EE 2369+';");
    }
    if(isset($_POST['EE_2169+_one']) &&
        $_POST['EE_2169+_one'] != queryMysql("SELECT one FROM lowerdiv WHERE user='$user' AND coursenum='EE 2169+';")){
        $first = sanitizeString($_POST['EE_2169+_one']);
        queryMysql("UPDATE lowerdiv SET one='$first' WHERE user='$user' AND coursenum='EE 2169+';");
    }
}

function update_second_attempt($user){
    if(isset($_POST['CS_1401+_two']) &&
        $_POST['CS_1401+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='CS 1401+';")){
        $second = sanitizeString($_POST['CS_1401+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='CS 1401+';");
    }
    if(isset($_POST['CS_2401+_two']) &&
        $_POST['CS_2401+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='CS 2401+';")){
        $second = sanitizeString($_POST['CS_2401+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='CS 2401+';");
    }
    if(isset($_POST['MATH_2300+_two']) &&
        $_POST['MATH_2300+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='MATH 2300+';")){
        $second = sanitizeString($_POST['MATH_2300+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='MATH 2300+';");
    }
    if(isset($_POST['CS_2302+_two']) &&
        $_POST['CS_2302+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='CS 2302+';")){
        $second = sanitizeString($_POST['CS_2302+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='CS 2302+';");
    }
    if(isset($_POST['EE_2369+_two']) &&
        $_POST['EE_2369+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='EE 2369+';")){
        $second = sanitizeString($_POST['EE_2369+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='EE 2369+';");
    }
    if(isset($_POST['EE_2169+_two']) &&
        $_POST['EE_2169+_two'] != queryMysql("SELECT two FROM lowerdiv WHERE user='$user' AND coursenum='EE 2169+';")){
        $second = sanitizeString($_POST['EE_2169+_two']);
        queryMysql("UPDATE lowerdiv SET two='$second' WHERE user='$user' AND coursenum='EE 2169+';");
    }
}

function update_third_attempt($user){
    if(isset($_POST['CS_1401+_three']) &&
        $_POST['CS_1401+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='CS 1401+';")){
        $third = sanitizeString($_POST['CS_1401+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='CS 1401+';");
    }
    if(isset($_POST['CS_2401+_three']) &&
        $_POST['CS_2401+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='CS 2401+';")){
        $third = sanitizeString($_POST['CS_2401+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='CS 2401+';");
    }
    if(isset($_POST['MATH_2300+_three']) &&
        $_POST['MATH_2300+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='CS 2300+';")){
        $third = sanitizeString($_POST['MATH_2300+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='MATH 2300+';");
    }
    if(isset($_POST['CS_2302+_three']) &&
        $_POST['CS_2302+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='CS 2302+';")){
        $third = sanitizeString($_POST['CS_2302+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='CS 2302+';");
    }
    if(isset($_POST['EE_2369+_three']) &&
        $_POST['EE_2369+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='EE 2369+';")){
        $third = sanitizeString($_POST['EE_2369+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='EE 2369+';");
    }
    if(isset($_POST['EE_2169+_three']) &&
        $_POST['EE_2169+_three'] != queryMysql("SELECT three FROM lowerdiv WHERE user='$user' AND coursenum='EE 2169+';")){
        $third = sanitizeString($_POST['EE_2169+_three']);
        queryMysql("UPDATE lowerdiv SET three='$third' WHERE user='$user' AND coursenum='EE 2169+';");
    }
}

function update_grades($user){
    if(isset($_POST['CS_1401+_GR']) &&
        $_POST['CS_1401+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='EE 2169+';")){
        $grade = sanitizeString($_POST['CS_1401+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 1401+';");
    }
    if(isset($_POST['CS_2401+_GR']) &&
        $_POST['CS_2401+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='CS 2401+';")){
        $grade = sanitizeString($_POST['CS_2401+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 2401+';");
    }
    if(isset($_POST['MATH_2300+_GR']) &&
        $_POST['MATH_2300+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='MATH 2300+';")){
        $grade = sanitizeString($_POST['MATH_2300+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='MATH 2300+';");
    }
    if(isset($_POST['CS_2302+_GR']) &&
        $_POST['CS_2302+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='CS 2302+';")){
        $grade = sanitizeString($_POST['CS_2302+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='CS 2302+';");
    }
    if(isset($_POST['EE_2369+_GR']) &&
        $_POST['EE_2369+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='EE 2369+';")){
        $grade = sanitizeString($_POST['EE_2369+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='EE 2369+';");
    }
    if(isset($_POST['EE_2169+_GR']) &&
        $_POST['EE_2169+_GR'] != queryMysql("SELECT GR FROM lowerdiv WHERE user='$user' AND coursenum='EE 2169+';")){
        $grade = sanitizeString($_POST['EE_2169+_GR']);
        queryMysql("UPDATE lowerdiv SET GR='$grade' WHERE user='$user' AND coursenum='EE 2169+';");
    }
}

$connection->close();
?>