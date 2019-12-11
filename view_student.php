<?php
require_once 'header.php';

$user = $_GET['view'];
$firstname = get_firstname("SELECT firstname FROM students WHERE user='$user';");
$lastname = get_lastname("SELECT lastname FROM students WHERE user='$user';");
echo "<h3>Viewing $firstname $lastname's ($user) degreeplan</h3><br>";
print_student_tables($user)

?>