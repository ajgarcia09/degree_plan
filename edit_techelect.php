<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
var_dump($_POST);
//update_course_num($user);
//update_course_name($user);
//update_first_attempt($user);
//update_second_attempt($user);
//update_third_attempt($user);
//update_grades($user);
print_techelect_table_for_edit("SELECT * FROM techelect WHERE user='$user'", "Technical Electives (15)*","edit_techelect.php");


?>