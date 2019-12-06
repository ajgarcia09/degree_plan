<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
//update_first_attempt($user);
//update_second_attempt($user);
//update_third_attempt($user);
//update_grades($user);
print_sciences_table_for_edit("SELECT * FROM sciences WHERE user='$user'", "Life & Physical Sciences (12)*","edit_sciences.php");

?>